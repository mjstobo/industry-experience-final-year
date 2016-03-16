<?php
namespace App\View\Helper;

use Cake\View\Helper;

class PDFHelper extends Helper
{
    function createPDF($settlement)
    {
        foreach($settlement as $row)
        {
            $tbl = "<br>";
            $tbl.= '<br><span class="rightAlign">Date: ' . date("d/m/Y") . '</span><br>';
            $tbl.= '<br><span class="rightAlign"><font size="8">Invoice: #' . $row->id . '</font></span>';
            $tbl.= '<br><span class="rightAlign"><font size="8">User ID: #' . $row->user->id . '</font></span>';
            $tbl.= '<h1>RECEIPT</h1>' . '<br><br>';
            $tbl.= '<b><br><br>' . $row->user->given_name . ' ' . $row->user->family_name . '</b><br>';
            $tbl.= $row->user->street_address . "<br>";
            $tbl.= $row->user->suburb . ' ' . $row->user->postcode . "<br>";
            $tbl.= $row->user->state->state_name . ' ' . $row->user->country->country_name . "<br>";
            $tbl.= "PH: " . ' ' . $row->user->phone_number . "<br>";
            $tbl.= "Email: " . ' ' . $row->user->email_address . "<br><br><br><br>";

            $tbl.= "<style>";
            $tbl.= "h1   {text-align:center;}";
            $tbl.= ".rightAlign {text-align:right;}";
            $tbl.= ".float {position:absolute; right:200;}";
            $tbl.= "table, td";
            $tbl.= "    {";
            $tbl.= "        border-color: #600;";
            $tbl.= "        border-style: solid;}";

            $tbl.= "    table";
            $tbl.= "    {";
            $tbl.= "        border-width: 0 0 1px 0px;";
            $tbl.= "        border-spacing: 0;";
            $tbl.= "        border-collapse: collapse;";
            $tbl.= "        margin:10px;}";

            $tbl.= "   td {";
            $tbl.= "       margin: 0;";
            $tbl.= "       padding: 4px;";
            $tbl.= "       border-width: 1px 1px 0 1px;";
            $tbl.= "       background-color: #FFC; }";
            $tbl.= "</style>";


            $tbl.= '<br><br><br><br><b><table>';
            $tbl.= "    <tr>";
            $tbl.= '        <th width="10%">Qty</th>';
            $tbl.= '        <th width="20%">Type</th>';
            $tbl.= '        <th width="50%">Description</th>';
            $tbl.= '        <th width="20%">Subtotal</th>';
            $tbl.= '    </tr>';
            $tbl.= '</table></b>';

            $tbl.= '<table>';
            $tbl.= '    <tr>';
            $tbl.= '        <th width="10%">1</th>';
            $tbl.= '        <th width="20%">' . $row->payment_type->pay_type_name . '</th>';
            $tbl.= '        <th width="50%">' . $row->payment_type->description . '</th>';
            $tbl.= '        <th width="20%">' . '$' . $row->amount . '.00' . '</th>';
            $tbl.= '    </tr><br><br><br><br><Br><br><br><br><br><br><br><br>';
            $tbl.= '    <tr>';
            $tbl.= '        <th colspan="3"></th>';
            $tbl.= '        <th width="20%"></th>';
            $tbl.= '    </tr>';
            $tbl.= '    <tr>';
            $tbl.= '        <th width="10%"></th>';
            $tbl.= '        <th width="20%"></th>';
            $tbl.= '        <th width="50%" style="text-align: right">Date Paid: </th>';
            $tbl.= '        <th width="20%">' . ' ' . $row->payment_date->i18nFormat('d/MM/yyyy') .  '</th>';
            $tbl.= '    </tr>';
            $tbl.= '    <tr>';
            $tbl.= '        <th width="10%"></th>';
            $tbl.= '        <th width="20%"></th>';
            $tbl.= '        <th width="50%" style="text-align: right">Method: </th>';
            $tbl.= '        <th width="20%">' . ' ' . $row->payment_method->method_name . '</th>';
            $tbl.= '    </tr>';
            $tbl.= '    <tr>';
            $tbl.= '        <th width="10%"></th>';
            $tbl.= '        <th width="20%"></th>';
            $tbl.= '    </tr><br>';
            $tbl.= '    <tr>';
            $tbl.= '        <th width="10%"></th>';
            $tbl.= '        <th width="20%"></th>';
            $tbl.= '        <th width="50%" style="text-align: right">Total: </th>';
            $tbl.= '        <th width="20%">' . ' ' . '$' . $row->amount . '.00</th>';
            $tbl.= '    </tr><br><br><br><br><br><br><br><br><br><br>';
            $tbl.= '    <tr>';
            $tbl.= '        <th colspan="4" style="text-align: center"><em>All prices are inclusive of GST and relevant taxes</em></th>';
            $tbl.= '    </tr>';
            $tbl.= '</table>';
        }

        return $tbl;

    }

    function createPDFLoan($loan, $lic1)
    {
        $tbl = "<br>";
        $tbl.= '<br><span class="rightAlign">Date: ' . date("d/m/Y") . '</span><br>';
        $tbl.= '<br><span class="rightAlign"><font size="8">Loan: #' . $loan->id . '</font></span>';
        $tbl.= '<br><span class="rightAlign"><font size="8">User ID: #' . $loan->user->id . '</font></span>';
        $tbl.= '<h1>Loan List</h1>' . '<br><br>';
        $tbl.= '<b><br><br>' . $loan->user->given_name . ' ' . $loan->user->family_name . '</b><br>';
        $tbl.= $loan->user->street_address . "<br>";
        $tbl.= $loan->user->suburb . ' ' . $loan->user->postcode . "<br>";
        $tbl.= $loan->user->state->state_name . ' ' . $loan->user->country->country_name . "<br>";
        $tbl.= "PH: " . ' ' . $loan->user->phone_number . "<br>";
        $tbl.= "Email: " . ' ' . $loan->user->email_address . "<br><br><br><br>";

        $tbl.= "<style>";
        $tbl.= "h1   {text-align:center;}";
        $tbl.= ".rightAlign {text-align:right;}";
        $tbl.= ".float {position:absolute; right:200;}";
        $tbl.= "table, td";
        $tbl.= "    {";
        $tbl.= "        border-color: #600;";
        $tbl.= "        border-style: solid;}";

        $tbl.= "    table";
        $tbl.= "    {";
        $tbl.= "        border-width: 0 0 1px 0px;";
        $tbl.= "        border-spacing: 0;";
        $tbl.= "        border-collapse: collapse;";
        $tbl.= "        margin:10px;}";

        $tbl.= "   td {";
        $tbl.= "       margin: 0;";
        $tbl.= "       padding: 4px;";
        $tbl.= "       border-width: 1px 1px 0 1px;";
        $tbl.= "       background-color: #FFC; }";
        $tbl.= "</style>";


        $tbl.= '<br><br><br><br><b><table>';
        $tbl.= "    <tr>";
        $tbl.= '        <th width="15%">Call No</th>';
        $tbl.= '        <th width="20%">Barcode</th>';
        $tbl.= '        <th width="65%">Title</th>';
        $tbl.= '    </tr>';
        $tbl.= '</table></b>';

        $tbl.= '<table>';

        $count=0;

        foreach($lic1 as $row)
        {
            $count++;
            $tbl.= '    <tr>';
            $tbl.= '        <th width="15%">' . $row->item_copy->item->call_number . '</th>';
            $tbl.= '        <th width="20%">' . $row->item_copy->barcode . '</th>';
            $tbl.= '        <th width="65%">' . $row->item_copy->item->title . '</th>';
            $tbl.= '    </tr>';

        }

        $tbl.= '<br><br><br><br><Br><br><br><br><br><br><br><br>';
        $tbl.= '    <tr>';
        $tbl.= '        <th colspan="4"></th>';
        $tbl.= '    </tr>';
        $tbl.= '    <tr>';
        $tbl.= '        <th width="10%"></th>';
        $tbl.= '        <th width="20%"></th>';
        $tbl.= '        <th width="50%" style="text-align: right">Total Items: </th>';
        $tbl.= '        <th width="20%">'. $count . '</th>';
        $tbl.= '    </tr>';
        $tbl.= '    <tr>';
        $tbl.= '        <th width="10%"></th>';
        $tbl.= '        <th width="20%"></th>';
        $tbl.= '        <th width="50%" style="text-align: right">Return Date: </th>';
        $tbl.= '        <th width="20%">' . $row->loan->return_date->i18nFormat('d/MM/yyyy') .  '</th>';
        $tbl.= '    </tr>';
        $tbl.= '    <tr>';
        $tbl.= '        <th width="10%"></th>';
        $tbl.= '        <th width="20%"></th>';
        $tbl.= '    </tr><br><br><br><br><br><br><br><br>';
        $tbl.= '</table>';

        return $tbl;

    }

}

?>



