<?php

App::uses('DebugTransport', 'Network/Email');

class LoggingTransport extends DebugTransport {

    public function send (CakeEmail $email) {
        $results = parent::send($email);
        $entry = "\n-----------------BEGIN EMAIL MESSAGE---------------------\n"
            . "Headers: \n" . $results['headers'] . "\nMessage: \n" . $results['message'] . "\n"
            . "------------------END MESSAGE----------------------------\n";
        CakeLog::debug($entry);
    }

}