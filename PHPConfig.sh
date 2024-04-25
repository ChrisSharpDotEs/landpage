#!/bin/bash
php_ini_file=$(php -i | grep "Loaded Configuration File" | awk '{print $NF}')
if[ -n "$php_ini_file" ]; then
	extension_line="extension=mail"

extension_line_commented=";extension=mail"

if ! grep -q "$extension_line" "$php_ini_file"; then
	echo "$extension_line" | sudo tee -a "$php_ini_file" > 
