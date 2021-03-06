--TEST--
enchant_broker_list_dicts() function
--CREDITS--
marcosptf - <marcosptf@yahoo.com.br>
--SKIPIF--
<?php
if (!extension_loaded('enchant')) {
	echo "skip: Enchant extension not enabled\n";
	exit;
}

$broker = enchant_broker_init();

if (!$broker) {
	echo "skip: Unable to init broker\n";
	exit;
}

if (!enchant_broker_list_dicts($broker)) {
	enchant_broker_free($broker);

	echo "skip: No broker dicts installed\n";
}

enchant_broker_free($broker);
?>
--FILE--
<?php
$broker = enchant_broker_init();
if (is_resource($broker)) {
    echo("OK\n");
    $brokerListDicts = enchant_broker_list_dicts($broker);

    if (is_array($brokerListDicts)) {
        echo("OK\n");
    } else {
        echo("broker list dicts failed\n");
    }
} else {
    echo("init failed\n");
}
?>
--EXPECT--
OK
OK
