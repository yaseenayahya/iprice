<?php
class CliTool
{

    private $text = "";

    private $csv_filename = "csv_output.csv";

    public function textIsNotEmpty(){
          return !empty($this->text);
    }

    public function getText(){
          return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function convertTextToUpperCase()
    {

        return strtoupper($this->text);

    }

    public function convertTextToMixedCase()
    {

        $text_array    = str_split($this->text);
        $use_lowercase = true;

        $text_mixed_case = "";

        foreach ($text_array as $alpha) {
            $text_mixed_case .= $use_lowercase ? strtolower($alpha) : strtoupper($alpha);
            $use_lowercase = !$use_lowercase;
        }

        return $text_mixed_case;
    }

    public function createCSVFile()
    {

        $file = fopen($this->csv_filename, "w");

        fputs($file, implode(',', str_split($this->text))."\n");

        //fputcsv($file, str_split($this->text));

        fclose($file);

    }
}
