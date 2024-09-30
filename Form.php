<?php
class Form {
    var $fields = array();
    var $action;
    var $submit = "";
    var $jumField = 0;

    function __construct($action, $submit) {
        $this->action = $action;
        $this->submit = $submit;
    }

    function displayForm() {
        echo "<form action='" . $this->action . "' method='post'>";
        echo "<table width='100%'>";

        for ($i = 0; $i < $this->jumField; $i++) {
            echo "<tr>
                    <td align='right'>" . $this->fields[$i]['label'] . "</td>
                    <td>";

            // Check the type of input and display accordingly
            if ($this->fields[$i]['type'] == 'dropdown') {
                echo "<select name='" . $this->fields[$i]['name'] . "'>";
                foreach ($this->fields[$i]['options'] as $option) {
                    echo "<option value='$option'>$option</option>";
                }
                echo "</select>";
            } elseif ($this->fields[$i]['type'] == 'radio') {
                foreach ($this->fields[$i]['options'] as $option) {
                    echo "<input type='radio' name='" . $this->fields[$i]['name'] . "' value='$option'> $option<br>";
                }
            } elseif ($this->fields[$i]['type'] == 'textarea') {
                echo "<textarea name='" . $this->fields[$i]['name'] . "'></textarea>";
            } else {
                // For other types like text, email, date, time, etc.
                $attributes = '';
                if (isset($this->fields[$i]['attributes'])) {
                    foreach ($this->fields[$i]['attributes'] as $key => $value) {
                        $attributes .= "$key='$value' ";
                    }
                }
                echo "<input type='" . $this->fields[$i]['type'] . "' name='" . $this->fields[$i]['name'] . "' $attributes>";
            }
            echo "</td></tr>";
        }

        echo "<tr><td colspan='2'><input type='submit' name='tombol' value='" . $this->submit . "'></td></tr>";
        echo "</table>";
        echo "</form>";
    }

    function addField($name, $label, $type = "text", $options = [], $attributes = []) {
        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['type'] = $type; 
        $this->fields[$this->jumField]['options'] = $options;
        $this->fields[$this->jumField]['attributes'] = $attributes;
        $this->jumField++;
    }
}
