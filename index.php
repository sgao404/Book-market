<?php
/**
 * Created by PhpStorm.
 * User: Sida
 * Date: 6/18/2015
 * Time: 7:57 PM
 */

include_once 'header.php';

    $query = "SELECT * FROM books";
    $result = queryMysql($query);
    $rows = mysql_num_rows($result);

echo <<<_END
<div class="container">
    <div class="row">
    <div class="col-md-6">
    <h1>Welcome!!!</h1>
    <h4>You need to log in to add or remove your posts.</h4>
    <h4>For username and password, only numbers and letters are allowed.</h4>
    <h4>All records will be displayed for 60 days at most.</h4>
    </div>
    <div class="col-md-6">
    <h1>Console:</h1>
    <div id="console">
    </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Book List:</h3>
                    <div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								Filter <i class="glyphicon glyphicon-filter"></i>
							</span>
                    </div>
                </div>
                <div class="panel-body">
                    <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Examples: CS111 or Learning PHP or whitecatgsd" />
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>ISBN</th>
                        <th>Condition(1-10)</th>
                        <th>Course</th>
                        <th>Price($)</th>
                        <th>Owner</th>
                        <th>Contact</th>
                    </tr>
                    </thead>
                    <tbody>
_END;
    for ($i = 0; $i < $rows; ++$i) {
        $row = mysql_fetch_row($result);
        $num = $i + 1;
        echo <<<_END
    <tr>
    <td>$num</td>
    <td>$row[1]</td>
    <td>$row[2]</td>
    <td>$row[3]</td>
    <td>$row[4]</td>
    <td>$row[5]</td>
    <td>$row[8]</td>
    <td>$row[7]</td>
    <td>
    <button type="button" class="btn btn-default btn-xs">
    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
    </button>
    </td>
    </tr>
_END;


};




?>

</tbody>
</table>
</div>
</div>
</div>
</div>


</body>
</html>