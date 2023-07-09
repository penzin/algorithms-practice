#!/bin/bash

/usr/bin/php vendor/bin/phpunit --testdox --configuration tests/phpunit.xml.dist tests $*
