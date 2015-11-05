<?php
    require 'vendor/autoload.php';

//    create instance from slim framework
    $app = new \Slim\Slim();
    $app->response->headers->set('Content-Type', 'application/json');

//    slim app routes
    $app->get('/', function() use($app) {
        echo "Welcome on the REST API of server-info.";
        echo "visit https://bitbucket.org/secanis/server-info for more information!";
    });

    /**
     * @api {get} /phpinfo Request PHP version information
     * @apiName PHPInfo
     * @apiGroup Server
     */ 
    $app->get('/phpinfo', function() use($app) {
        phpinfo();
    });

    /**
     * @api {get} /server/filesystem Request information about the filesystem
     * @apiName Server Filesystem
     * @apiGroup Server
     */ 
    $app->get('/server/filesystem', function() use($app) {
        $object = array();
        $cmd = exec('df -k', $output);
        
        foreach ($output as $line) {
            $elements = preg_split('/\s+/',$line);
            if ($elements[0] != "Filesystem" && $elements[2] != "Used") {
                array_push($object, array(
                    'filesystem' => $elements[0],
                    'kblocks' => $elements[1],
                    'used' => $elements[2],
                    'available' => $elements[3],
                    'usePrecentage' => $elements[4],
                    'mountpoint' => $elements[5])
                );
            }
        }
        $app->response->setBody(json_encode($object));
    });

    /**
     * @api {get} /server/partition Request information about partition
     * @apiName Server Partition
     * @apiGroup Server
     */ 
    $app->get('/server/partition', function() use($app) {
        $object = array();
        $cmd = exec('lsblk', $output);
        
        foreach ($output as $line) {
            $elements = preg_split('/\s+/',$line);
            if ($elements[0] != "NAME" && $elements[0] != "" && $elements[3] != "SIZE") {
                $elements[0] = str_replace('-', '', $elements[0]);
                $elements[0] = str_replace('|', '', $elements[0]);
                $elements[0] = str_replace('`', '', $elements[0]);
                if (!isset($elements[6])) {
                    $elements[6] = "";
                }
                array_push($object, array(
                    'name' => $elements[0],
                    'size' => $elements[3],
                    'type' => $elements[5],
                    'mountpoint' => $elements[6])
                );
            }
        }
        $app->response->setBody(json_encode($object));
    });

    /**
     * @api {get} /server/hardware Request information about the computer hardware
     * @apiName Server Hardware
     * @apiGroup Server
     */ 
    $app->get('/server/hardware', function() use($app) {
        $object = array();
        $output = shell_exec('lshw -json');
        $app->response->setBody($output);
    });

    $app->get('/server/sensors', function() use($app) {
        $object = array();
        $cmd= exec('sensors', $output);
        
        foreach ($output as $line) {
           // need to find the temperature in:
           // Core 0:       +39.0 C  (crit = +100.0 C)
           if (preg_match('/Core\s+0:\s+\+(\d+).*/',$line,$match)) 
           {
               $object["cpu_temperature"] = $match[1];
           }

           // need to find the temperature in:
           // temp1:        +49.0 C  (low  =  -1.0 C, high = +127.0 C)  sensor = thermistor 
           if (preg_match('/temp1:\s+\+(\d+).*/',$line,$match)) 
           {
               $object["case_temperature"] = $match[1];
           }
        }
        $app->response->setBody(json_encode($object));
    });

    $app->get('/server/metadata', function() use($app) {
        $app->response->setBody(json_encode($_SERVER));
    });

//    run slim application
    $app->run();
?>