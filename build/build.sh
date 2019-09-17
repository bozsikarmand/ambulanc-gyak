#!/bin/bash

DEST="../public"
html=".html"

mkdir -p "$DEST/"

for f in *.php; 
do
    php $f | sed 's:\(<a.*href=".*\)\.php\(".*</a>\):\1\.html\2:g' > "$DEST/${f/.php/$html}";
    echo "Processing $f into ${f/.php/$html}..";
done

for f in *.css; 
do
    cat $f > "$DEST/$f";
    echo "Processing $f file..";
done

for f in *.js; 
do
    cat $f > "$DEST/$f";
    echo "Processing $f file..";
done

echo "Process complete." ;