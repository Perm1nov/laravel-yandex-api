#!/bin/sh
set -e

export $(egrep -v '^#' .env | xargs)

docker build \
    -t mediaten/php:"${PHP_VERSION}" \
    -t mediaten/php:latest \
    --build-arg PHP_BASE_IMAGE_VERSION="${PHP_VERSION}" \
    ./docker/php/
