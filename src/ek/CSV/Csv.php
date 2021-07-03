<?php 

namespace ek\CSV;


class Csv
{
        protected $csv;

        public function create(array $rows, array $header, $delimiter = ',')
        {
            if (count($header) > 0)
                array_unshift($rows, $header);
            
            $stream = fopen('php://output', 'r+');

            foreach ($rows as $row)
            {
                fputcsv($stream, $row, $delimiter);
                
                $this->csv = str_replace(PHP_EOL, '\r\n', stream_get_contents($stream));
            }

            fclose($stream);
        }

        public function render(array $header, array $rows, $fileName = 'export.csv')
        {
            $this->create($rows, $header);

            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $fileName . '"');
            header('Cache-Control: private');
            header('pragma: cache');
            
            $this->execute();
        }

        private function execute()
        {
            ob_start();
            print $this->csv;
            ob_get_clean();

            exit;
        }

}
