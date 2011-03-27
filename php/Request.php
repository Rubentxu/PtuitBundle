<?php

/*
Copyright (C) <2011> <rubentxu>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Affero General Public License as
published by the Free Software Foundation, either version 3 of the
License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.

*/

class Request {

    private $datos;

    public function __construct(array $server=array(), array $get=array(), array $post=array(),
            array $cookie=array(), array $files=array(), array $env=array()) {
        $this->datos['server'] = $server;
        $this->datos['get']
                = $get;
        $this->datos['post']
                = $post;
        $this->datos['cookie'] = $cookie;
        $this->datos['files'] = $files;
        $this->datos['env']
                = $env;
    }

    public function __call($type, array $arguments) {
        if (!isset($this->datos[$type])) {
            throw new BadMethodCallException;

        }
        if (empty($arguments) ||
                !isset($this->datos[$type][$arguments[0]])) {
            return NULL;
        }
        return $this->datos[$type][$arguments[0]];
    }



}

?>