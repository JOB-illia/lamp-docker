<?php
phpinfo();

$connect = mysqli_connect(
    'lamp-docker',
    'lamp_docker',
    'root',
    'lamp_docker'
);

$query = 'SELECT * FROM blog';
$result = mysqli_query($connect, $query);

echo '<h1>MySql Connect: </h1>';

while($record = mysqli_fetch_assoc($result)) {
    echo '<h2>'.$record['title'].'</h2>';
    echo '<p>'.$record['content'].'</p>';
    echo '<hr />';
}