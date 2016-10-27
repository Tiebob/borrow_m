<?php
include_once('function.php');

define("UPLOAD_DIR", "C:/wagon/uwamp/www/default/borrow_m/files/");

//exit( 'OK');
//dump( $_FILES );
//print_r( $_FILES);
//exit( );


if( !empty($_FILES['file-0']['name']) ) {
    $myfile = $_FILES['file-0'];


    if( $myfile['error'] !== UPLOAD_ERR_OK ){
        print "<p>上傳時發生錯誤！</p>";
        exit();
    }


    $name = 'students_' . date('Ymd') . '.xml';


    $upload_status = move_uploaded_file( $myfile['tmp_name'],  UPLOAD_DIR . $name);


    if( $upload_status ){
        print 'OK';
    }else{
        print 'ERR';
    }


    /*if( $upload_status ){
        $students = parse_students_xml( UPLOAD_DIR . $name );

        if( count( $students ) ){
            add_students($students);
        };
    }*/

}else{
    print 'ERR: $_FILES is empty';
}

