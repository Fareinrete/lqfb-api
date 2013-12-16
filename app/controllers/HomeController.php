<?php

class HomeController extends BaseController {

    protected $layout = 'layout';

    private function googlePie($data, $name, $title = NULL)
    {
        $o = '<script type="text/javascript" src="https://www.google.com/jsapi"></script>' . "\n";
        $o.= '<script type="text/javascript">' . "\n";
        $o.= 'google.load("visualization", "1", {packages:["corechart"]});' . "\n";
        $o.= 'google.setOnLoadCallback(drawChart);' . "\n";
        $o.= 'function drawChart() {' . "\n";
            $o.= 'var data = google.visualization.arrayToDataTable(' . "\n";
            $o.= json_encode($data, JSON_NUMERIC_CHECK);
            $o.= ");" . "\n";

            $o.= 'var options = {' . "\n";
                $o.= "title: '$title'\n";
            $o.= '};' . "\n";

            $o.= "var chart = new google.visualization.PieChart(document.getElementById('$name'));" . "\n";
            $o.= 'chart.draw(data, options);' . "\n";
        $o.= '}' . "\n";
        $o.= '</script>' . "\n";
        return $o;
    }

    public function showHome()
    {
        return View::make('hello');
    }

    public function showUsers()
    {
        $a = array(array('Stato','Utenti'),
             array('Attivi', Member::where('active', 'TRUE')->count()),
             array('Non attivi', Member::where('active', 'FALSE')->count()));
        $this->layout->head = $this->googlePie($a, 'piechart');
        $this->layout->content = View::make('users');
    }

}