<?php echo form_open('survey/process_test')?>
<table width="50%">
  <tr>
    <td><input type="checkbox" name="qa[1][0]" id="qa[1][0]" value="1">
      a1</td>
    <td><input type="checkbox" name="qa[1][1]" id="qa[1][1]" value="2">
      a2</td>
    <td><input type="checkbox" name="qa[1][2]" id="qa[1][2]" value="3">
      a3</td>
  </tr>
  <tr>
    <td><input type="checkbox" name="qa[2][0]" id="qa[2][0]" value="1">
    b1</td>
    <td><input type="checkbox" name="qa[2][1]" id="qa[2][1]" value="2">
    b2</td>
    <td><input type="checkbox" name="qa[2][2]" id="qa[2][2]" value="3">
    b3</td>
  </tr>
  <tr>
    <td><input type="checkbox" name="qa[3][0]" id="qa[3][0]" value="1">
    c1</td>
    <td><input type="checkbox" name="qa[3][1]" id="qa[3][1]" value="2">
    c2</td>
    <td><input type="checkbox" name="qa[3][2]" id="qa[3][2]" value="3">
    c3</td>
  </tr>
</table>
<input name="all_row" type="hidden" id="all_row" value="3">
<input name="all_column" type="hidden" id="all_column" value="3">
<input type="submit" name="button" id="button" value="Submit">
<?php echo form_close()?>