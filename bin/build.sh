#!/bin/sh

set -e 
make install 
make migrate
make import
