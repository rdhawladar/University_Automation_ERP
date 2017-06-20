<html>
<head>
    <link rel="stylesheet" type="text/css" href="print.css" />
    <link rel="stylesheet" type="text/css" href="Style.css" />
    <script type="text/javascript">
/*--This JavaScript method for Print command--*/
    function PrintDoc() {
        var toPrint = document.getElementById('printarea');
        var popupWin = window.open('', '_blank', 'width=350,height=150,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">')
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
/*--This JavaScript method for Print Preview command--*/
    function PrintPreview() {
        var toPrint = document.getElementById('printarea');
        var popupWin = window.open('', '_blank', 'width=350,height=150,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Print Preview::</title><link rel="stylesheet" type="text/css" href="Print.css" media="screen"/></head><body">')
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
</script>
</head>
<body  id="printarea">
    <table class="tble">
        <tr>
            <td>
                Student Name
            </td>
            <td>
                John Sypon
            </td>
        </tr>
        <tr>
            <td>
                Student Rollnumber
            </td>
            <td>
                R001
            </td>
        </tr>
        <tr>
            <td>
                Student Address
            </td>
            <td>
                132 Kane Street Toledo OH 43612.
            </td>
        </tr>
        <tr>
            <td>
                <input type="button" value="Print" class="btn" onclick="PrintDoc()"/>
            </td>
            <td>
                <input type="button" value="Print Preview" class="btn" onclick="PrintPreview()"/>
            </td>
        </tr>
    </table>
</body>
</html>