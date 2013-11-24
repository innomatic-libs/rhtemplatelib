<?php
/***************************************
** Title........: Template Example
** Filename.....: seperate-script.php
** Author.......: Richard Heyes
** Version......: 1.0
** Notes........: This shows how you can
**                use multiple template files.
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
** The template goodies.
***************************************/
        $tpl = new template;

        $tpl->load_file('header', 'header-template.html');
        $tpl->load_file('main', 'main-template.html');
        $tpl->load_file('footer', 'footer-template.html');

        $tpl->register('header', 'test_var, page_title');

        $tpl->parse('header, main, footer');
        $tpl->parse_loop('main', 'table_rows');

        $tpl->print_file('header, main, footer');
?>