#Ek CSV

##How to use it?


```
require 'vendor/autoload.php';

$csv = new ek\CSV();
$header = ['Full Name', 'Address', 'City', 'State', 'Zip'];
$rows = ['John Doe', '1234 Street', 'St.Louis', 'MO', '63139'];
$exportFileName = 'export.csv'

$csv->render($headers, $rows, $exportfileName);

```