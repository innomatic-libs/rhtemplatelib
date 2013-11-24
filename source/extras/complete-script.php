<?php
/***************************************
** Title........: Template Example
** Filename.....: complete-script.php
** Author.......: Richard Heyes
** Version......:
** Notes........: This shows an example of
**                using just one template file
** Last changed.: 23/05/00
** Last change..:
***************************************/

        include('class.template.inc');

/***************************************
** Set a couple of example variables.
***************************************/
        $test_var = 'Hello world!';
        $page_title = 'Template Class';

/***************************************
** Set a couple of example arrays.
***************************************/
        $table_rows = array();
        $table_rows[] = array( 'column_1' => 'This is column one on row one!',
                               'column_2' => 'This is column two on row one!',
                               'column_3' => 'This is column three on row one!'
                             );

        $table_rows[] = array( 'column_1' => 'This is column one on row two!',
                               'column_2' => 'This is column two on row two!',
                               'column_3' => 'This is column three on row two!'
                             );

/***************************************
** Postgres stuff. This was the code I
** used to test the $obj->parse_pgsql()
** method. Worked too.
***************************************/
/*
        $pg = pg_connect('user=richard dbname=scripts port=5432');

        $sqlquery = 'SELECT col1 AS column_1, col2 AS column_2, col3 AS column_3 FROM test';
        $table_rows = pg_exec($pg, $sqlquery);
*/
/***************************************
** The template goodies, using shortcut
** functions.
***************************************/
        $tpl = new template;
        $tpl->load_file('complete', 'complete-template.html');
        $tpl->parse_loop('complete', 'table_rows');
        $tpl->pprint('complete', array('test_var','page_title'));

/***************************************
** The template goodies, using the
** longer method.
***************************************/
/*
        $tpl->load_file('complete', 'complete-template.html');
        $tpl->register('complete', 'test_var,page_title');
        $tpl->parse('complete');
        $tpl->parse_loop('complete', 'table_rows');
        $tpl->print_file('complete');
*/
?>