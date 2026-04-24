#!/bin/bash

### Add /SCP Dir to PATH
export PATH=$PATH:/SCP:/COM

### Add +x Scripts in /COM and /SCP Dir
chmod +x /COM/*
chmod +x /SCP/*

### Simplication
if [ "$SIMPLIFICATED" == "NO" ]; then
                    echo "Run All Services...Done!"
                    nonsimplificated.sh
elif [ "$SIMPLIFICATED" == "YES" ]; then
                    echo "Simplicated...Done!"
                    simplificated.sh
fi