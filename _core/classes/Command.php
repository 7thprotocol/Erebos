<?php
class Command extends Desktop
{
    public function post($command)
    {
        $request = explode(" ", $command);

        if($request[0] == "debug"){
            if(!empty($request[3]) && !empty($request[4])){
                $this->debug($request[1], $request[2], $request[3], $request[4]);
            } else {
                $this->debug($request[1], $request[2]);
            }
        }

        elseif($request[0] == "vim") {
            if(count($request) == 4){
                $return = $this->editContent($request[1], $request[2], $request[3]);
                return $return;
            } else {
                return '- At least 3 parameters are required, "vim $newValue $refKey $refValue".';
            }
        }

        elseif($request[0] == "update") {
            if(count($request) == 6){
                $return = $this->updateValue($request[1], $request[2], $request[3], $request[4], $request[5]);
                return $return;
            } else {
                return '- At least 5 parameters are required, "update $table $key $newValue $refKey $refValue".';
            }
        }

        elseif($request[0] == "addColumn") {
            if(count($request) == 5){
                $return = $this->addColumn($request[1], $request[2], $request[3], $request[4]);
                return $return;
            } else {
                return '- At least 4 parameters are required, "addColumn $table $name $type $after".';
            }
        }

        elseif($request[0] == "delete") {
            if(count($request) == 4){
                $return = $this->deleteRow($request[1], $request[2], $request[3]);
                return $return;
            } else {
                return '- At least 3 parameters are required folder, "delete $table $refKey $refValue."';
            }
        }

        elseif($request[0] == "fetch") {
            if(count($request) == 5){
                $return = $this->fetchValue($request[1], $request[2], $request[3], $request[4]);
                return $return;
            } else {
                return '- At least 4 parameters are required, "fetch $key $table $refKey $refValue".';
            }
        }

        elseif($request[0] == "mkdir") { 
            if(count($request) == 3){
                $return = $this->createFolder($request[1], $request[2]);
                return $return;
            } else {
                return '- At least 2 parameters are required folder, "mkdir $path $name."';
            }
        }

        elseif($request[0] == "touch") {
            if(count($request) == 4){
                $return = $this->createFile($request[1], $request[2], $request[3]);
                return $return;
            } else {
                return '- At least 4 parameters are required folder, "touch $path $name $meta."';
            }
        }

        elseif($request[0] == "object") {
            if(count($request) == 4){
                $return = $this->fetchObject($request[1], $request[2], $request[3]);
                return  json_encode($return);
            } else {
                return '- At least 3 parameter are required, "object $table $refKey $refValue"';
            }
        }

        elseif($request[0] == "lorem"){
            return 
            '<p>
                - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
            </p>';
        }
        elseif($request[0] == "help"){
            return 
            '<p>Erebos is a database management system web-terminal using commands.</p>            
            <ul>
                <div><u>Database:</u></div>
                <li><b>debug</b>     : Get an array of a table vardumped on the left screen.</li>
                <li><b>update</b>    : Update a value.</li>
                <li><b>addColumn</b> : Add a column on a table.</li>
                <li><b>delete</b>    : Delete an object.</li>
                <li><b>fetch</b>     : Read a specific value.</li>
                <li><b>mkdir</b>     : Create a folder format and store it.</li>
                <li><b>touch</b>     : Create a file format and store it.</li>
                <li><b>object</b>    : Read an object.</li>
            </ul>
            <ul>
                <div><u>Tools:</u></div>
                <li><b>vim</b>       : Edit a file content.</li>
            </ul>
            <ul>
                <div><u>Utilities:</u></div>
                <li><b>clear</b>     : Clear the principal screen.</li>
                <li><b>reset</b>   : Refresh the page.</li>
                <li><b>lorem</b>     : A lot of text.</li>
            </ul>';
        }

        else {
            return "- Invalid Command! Please enter a valid command or use \"help\" for more information.";
        }
    }
}
