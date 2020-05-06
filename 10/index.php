<?php

use errors\MyException1;
use errors\MyException2;
use errors\MyException3;
use errors\MyException4;
use errors\MyException5;


spl_autoload_register(function ($className) {
    require_once __DIR__ . "/" . str_replace("\\", "/", $className) . ".php";
});

$exc = new ExcClass();
$ExcClass = get_class_methods($exc);

foreach ($ExcClass as $generator) {
    try {
        $exc->$generator();
    } catch (MyException1 $e) {
        echo $e->getMessage() . "\n";
    } catch (MyException2 $e) {
        echo $e->getMessage() . "\n";
    } catch (MyException3 $e) {
        echo $e->getMessage() . "\n";
    } catch (MyException4 $e) {
        echo $e->getMessage() . "\n";
    } catch (MyException5 $e) {
        echo $e->getMessage() . "\n";
    }catch (\Exception $e){
        echo $e;
    }
}
