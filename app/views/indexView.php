sasadsadsa
<?php

echo $this->header;
echo $this->footer;

foreach($this->tasks as $row){
    print $row['name'] . 'view';
}
