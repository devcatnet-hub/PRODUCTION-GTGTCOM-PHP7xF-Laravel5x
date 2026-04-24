#!/bin/bash

### Universal
    rm -rf /usr/share/man/*
    rm -rf /var/cache/apk/*
    rm -rf /tmp/*

### Specific
    composer clearcache
