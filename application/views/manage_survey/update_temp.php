<?php @session_start(); $all_session = $this->session->all_userdata();?><!--ตัวแปร รับค่า session ทั้งหมด-->
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_radius">
  <tr>
    <td valign="top">
    <div id="fade" class="black_overlay_autopopup"></div>
    <div id="light_question" class="white_content_question_autopopup" align="left">
		<?php $arr = $this->uri->segment(3);if($_SESSION['temp_all'][$arr]['type']=="mulitiple_only"){?>
		<?php echo form_open('ci_manage_temp/mulitiple_only_update')?>
            <p><table width="90%" align="center">
              <tr>
                <td><strong>ประเภท คำถามแบบเลือกตอบเพียง 1 คำตอบ</strong></td>
              </tr>
              <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
              <tr>
                <td>
                <input name="question_mulitiple_only" id="question_mulitiple_only" type="text" class="k-textbox" style="width:100%" value="<?php echo @$_SESSION['temp_all'][$arr]['question_mulitiple_only']?>" />
                </td>
              </tr>
			  <tr>
                <td><strong>คำตอบ</strong></td>
              </tr>
			  <tr>
                <td><textarea name="answer_mulitiple_only" id="answer_mulitiple_only" class="k-textbox" style="width:100%; height:200px;"><?php echo @$_SESSION['temp_all'][$arr]['answer_mulitiple_only']?></textarea></td>
              </tr>
			  <tr>
              <?php if(@$_SESSION['temp_all'][$arr]['other_mulitiple_only']!=""){@$other_mulitiple_only = 'checked="checked"';}?>
                <td class="table_default"><input name="other_mulitiple_only" type="checkbox" value="other" <?php echo @$other_mulitiple_only;?>/>เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
              <?php if(@$_SESSION['temp_all'][$arr]['check_mulitiple_only']!=""){@$check_mulitiple_only = 'checked="checked"';}?>
                <td class="table_default"><input name="check_mulitiple_only" type="checkbox" value="check" <?php echo @$check_mulitiple_only;?>/>บังคับให้ตอบคำถามนี้</td>
              </tr>
			  <tr>
                <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/> <?php echo anchor('survey/insert_template','<input type="none" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>');?><input name="chanel" id="chanel" type="hidden" value="<?php echo $arr; ?>" /></td>
              </tr>
            </table></p>
		<?php echo form_close();?>
        <?php } ?>
        <?php $arr = $this->uri->segment(3);if($_SESSION['temp_all'][$arr]['type']=="mulitiple_multiple"){?>
        <?php echo form_open('ci_manage_temp/mulitiple_multiple_update')?>
            <table width="90%" align="center">
              <tr>
                <td><strong>ประเภท คำถามแบบเลือกตอบหลายคำตอบ</strong></td>
              </tr>
              <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
              <tr>
                <td><input name="question_mulitiple_multiple" id="question_mulitiple_multiple" type="text" class="k-textbox" style="width:100%" value="<?php echo @$_SESSION['temp_all'][$arr]['question_mulitiple_multiple']?>" /></td>
              </tr>
			  <tr>
                <td><strong>คำตอบ</strong></td>
              </tr>
			  <tr>
                <td><textarea name="answer_mulitiple_multiple" id="answer_mulitiple_multiple" class="k-textbox" style="width:100%; height:200px;"><?php echo @$_SESSION['temp_all'][$arr]['answer_mulitiple_multiple']?></textarea></td>
              </tr>
              <tr>
              <?php if(@$_SESSION['temp_all'][$arr]['other_mulitiple_multiple']!=""){@$other_mulitiple_multiple = 'checked="checked"';}?>
                <td class="table_default"><input name="other_mulitiple_multiple" type="checkbox" value="other" <?php echo @$other_mulitiple_multiple;?>/>เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
              <?php if(@$_SESSION['temp_all'][$arr]['check_mulitiple_multiple']!=""){@$check_mulitiple_multiple = 'checked="checked"';}?>
                <td class="table_default"><input name="check_mulitiple_multiple" type="checkbox" value="check" <?php echo @$check_mulitiple_multiple;?>/>บังคับให้ตอบคำถามนี้</td>
              </tr>
			  <tr>
                <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/> <?php echo anchor('survey/insert_template','<input type="none" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>');?><input name="chanel" id="chanel" type="hidden" value="<?php echo $arr; ?>" /></td>
              </tr>
            </table></p>
		<?php echo form_close();?>
        <?php } ?>
        <?php $arr = $this->uri->segment(3);if($_SESSION['temp_all'][$arr]['type']=="comment"){?>
		<?php echo form_open('ci_manage_temp/comment_update')?>
            <table width="90%" align="center">
              <tr>
                <td><strong>ประเภท คำถามแบบคำตอบยาว</strong></td>
              </tr>
              <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
              <tr>
                <td><input name="comment" id="comment" type="text" class="k-textbox" style="width:100%;" value="<?php echo @$_SESSION['temp_all'][$arr]['comment']?>" /></td>
              </tr>
              <tr>
              <?php if(@$_SESSION['temp_all'][$arr]['check_comment']!=""){@$check_comment = 'checked="checked"';}?>
                <td class="table_default"><input name="check_comment" type="checkbox" value="check" <?php echo @$check_comment;?>/>บังคับให้ตอบคำถามนี้</td>
              </tr>
			  <tr>
                <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/> <?php echo anchor('survey/insert_template','<input type="none" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>');?><input name="chanel" id="chanel" type="hidden" value="<?php echo $arr; ?>" /></td>
              </tr>
            </table>
		<?php echo form_close();?>
        <?php } ?>
        <?php $arr = $this->uri->segment(3);if($_SESSION['temp_all'][$arr]['type']=="ranking"){?>
        <?php echo form_open('ci_manage_temp/ranking_update')?>
            <p><table width="90%" align="center">
              <tr>
                <td><strong>ประเภท ตัวเลือกอันดับ</strong></td>
              </tr>
              <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
              <tr>
                <td><input name="question_ranking" id="question_ranking" type="text" class="k-textbox" style="width:100%" value="<?php echo @$_SESSION['temp_all'][$arr]['question_ranking']?>" /></td>
              </tr>
			  <tr>
                <td><strong>คำตอบ</strong></td>
              </tr>
			  <tr>
                <td><textarea name="answer_ranking" id="answer_ranking" class="k-textbox" style="width:100%; height:200px;"><?php echo @$_SESSION['temp_all'][$arr]['answer_ranking']?></textarea></td>
              </tr>
              <tr>
              <?php if(@$_SESSION['temp_all'][$arr]['other_ranking']!=""){@$other_ranking = 'checked="checked"';}?>
                <td class="table_default"><input name="other_ranking" type="checkbox" value="other" <?php echo @$other_ranking;?>/>เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
              <?php if(@$_SESSION['temp_all'][$arr]['check_ranking']!=""){@$check_ranking = 'checked="checked"';}?>
                <td class="table_default"><input name="check_ranking" type="checkbox" value="check" <?php echo @$check_ranking;?>/>บังคับให้ตอบคำถามนี้</td>
              </tr>
			  <tr>
                <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/> <?php echo anchor('survey/insert_template','<input type="none" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>');?><input name="chanel" id="chanel" type="hidden" value="<?php echo $arr; ?>" /></td>
              </tr>
            </table></p>
		<?php echo form_close();?> 
        <?php } ?>
        <?php $arr = $this->uri->segment(3);if($_SESSION['temp_all'][$arr]['type']=="ranking_scale"){?>
        <?php echo form_open('ci_manage_temp/ranking_scale_update')?>
		<table width="90%" align="center">
              <tr>
                <td><strong>ประเภท การจัดลำดับทัศนคติ</strong></td>
              </tr>
              <tr>
                <td><strong>หัวข้อคำถาม</strong></td>
              </tr>
              <tr>
                <td><input name="question_ranking_scale" id="question_ranking_scale" type="text" class="k-textbox" style="width:100%" value="<?php echo @$_SESSION['temp_all'][$arr]['question_ranking_scale']?>" /></td>
              </tr>
			  <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
                <td width="100%" >
                <textarea name="answer_ranking_scale" id="answer_ranking_scale" cols="35" rows="8" class="k-textbox" style="width:100%;"><?php echo @$_SESSION['temp_all'][$arr]['answer_ranking_scale']?></textarea>
                </td>
                    </tr>
                  </table>
                  <table width="90%" align="center">
                    <tr>
             	<td width="65%"><strong>เกณฑ์</strong></td>
                <td width="35%"><strong>ค่าน้ำหนัก</strong></td>
             </tr>
			<tr>
				<td width="65%"><textarea name="ranking_scale" id="ranking_scale" cols="35" rows="8" class="k-textbox" style="width:100%;"><?php echo @$_SESSION['temp_all'][$arr]['ranking_scale']?></textarea></td>
				<td width="35%"><textarea name="ranking_scale_weight" id="ranking_scale_weight" cols="35" rows="8" class="k-textbox" style="width:100%;"><?php echo @$_SESSION['temp_all'][$arr]['ranking_scale_weight']?></textarea></td>
			</tr>
             
 			  <tr>
              <?php if(@$_SESSION['temp_all'][$arr]['other_ranking_scale']!=""){@$other_ranking_scale = 'checked="checked"';}?>
                <td class="table_default"><input name="other_ranking_scale" type="checkbox" value="other" <?php echo @$other_ranking_scale;?>/>เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
              <?php if(@$_SESSION['temp_all'][$arr]['check_ranking_scale']!=""){@$check_ranking_scale = 'checked="checked"';}?>
                <td class="table_default"><input name="check_ranking_scale" type="checkbox" value="check" <?php echo @$check_ranking_scale;?>/>บังคับให้ตอบคำถามนี้</td>
              </tr>
			  <tr>
                <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/> <?php echo anchor('survey/insert_template','<input type="none" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>');?><input name="chanel" id="chanel" type="hidden" value="<?php echo $arr; ?>" /></td>
              </tr>
		</table>
		<?php echo form_close();?>
        <?php } ?>
        <?php $arr = $this->uri->segment(3);if($_SESSION['temp_all'][$arr]['type']=="matrix_only"){?>
        <?php echo form_open('ci_manage_temp/matrix_only_update')?>
            <table width="90%" align="center">
              <tr>
                <td><strong>ประเภท คำถามแบบเลือกตอบ 1 คำตอบในรูปแบบเมตริก</strong></td>
              </tr>
              <tr>
                <td><input name="question_matrix_only" id="question_matrix_only" type="text" class="k-textbox" style="width:80%"  value="<?php echo @$_SESSION['temp_all'][$arr]['question_matrix_only']?>" /></td>
              </tr>
              <tr>
                  <td></td>
			  <tr>
                <td width="70%" >ตัวเลือกแนวตั้ง<br />
                <textarea name="answer_matrix_only" id="answer_matrix_only" cols="45" rows="10" class="k-textbox" style="width:100%;"><?php echo @$_SESSION['temp_all'][$arr]['answer_matrix_only']?></textarea>
                </td>
             </tr>
			<tr>
                <td width="70%" >ตัวเลือกแนวนอน<br />
                <textarea name="ranking_matrix_only" id="ranking_matrix_only" cols="45" rows="10" class="k-textbox" style="width:100%;"><?php echo @$_SESSION['temp_all'][$arr]['ranking_matrix_only']?></textarea>
                </td>
             </tr>
             <tr>
             <?php if(@$_SESSION['temp_all'][$arr]['other_matrix_only']!=""){@$other_matrix_only = 'checked="checked"';}?>
                <td class="table_default"><input name="other_matrix_only" type="checkbox" value="other" <?php echo @$other_matrix_only;?>/>เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
              <?php if(@$_SESSION['temp_all'][$arr]['check_matrix_only']!=""){@$check_matrix_only = 'checked="checked"';}?>
                <td class="table_default"><input name="check_matrix_only" type="checkbox" value="check" <?php echo @$check_matrix_only;?>/>บังคับให้ตอบคำถามนี้</td>
              </tr>
			  <tr>
                <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/> <?php echo anchor('survey/insert_template','<input type="none" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>');?><input name="chanel" id="chanel" type="hidden" value="<?php echo $arr; ?>" /></td>
              </tr>
            </table>
		<?php echo form_close();?>
        <?php } ?>
        <?php $arr = $this->uri->segment(3);if($_SESSION['temp_all'][$arr]['type']=="matrix_multiple"){?>
        <?php echo form_open('ci_manage_temp/matrix_multiple_update')?>
            <table width="90%" align="center">
              <tr>
                <td><strong>ประเภท คำถามแบบเลือกหลายคำตอบในรูปแบบเมตริก</strong></td>
              </tr>
              <tr>
                <td><input name="question_matrix_multiple" id="question_matrix_multiple" type="text" class="k-textbox" style="width:80%" value="<?php echo @$_SESSION['temp_all'][$arr]['question_matrix_multiple']?>" /></td>
              </tr>
              <tr>
                  <td></td>
			  <tr>
                <td width="70%" >ตัวเลือกแนวตั้ง<br />

                <textarea name="answer_matrix_multiple" id="answer_matrix_multiple" cols="45" rows="10" class="k-textbox" style="width:100%;"><?php echo @$_SESSION['temp_all'][$arr]['answer_matrix_multiple']?></textarea>
                </td>
             </tr>
             			  <tr>
                <td width="70%" >ตัวเลือกแนวนอน<br />

                <textarea name="ranking_matrix_multiple" id="ranking_matrix_multiple" cols="45" rows="10" class="k-textbox" style="width:100%;"><?php echo @$_SESSION['temp_all'][$arr]['ranking_matrix_multiple']?></textarea>
                </td>
             </tr>
             <tr>
             <?php if(@$_SESSION['temp_all'][$arr]['other_matrix_multiple']!=""){@$other_matrix_multiple = 'checked="checked"';}?>
                <td class="table_default"><input name="other_matrix_multiple" type="checkbox" value="other" <?php echo @$other_matrix_multiple;?>/>เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
              <?php if(@$_SESSION['temp_all'][$arr]['check_matrix_multiple']!=""){@$check_matrix_multiple = 'checked="checked"';}?>
                <td class="table_default"><input name="check_matrix_multiple" type="checkbox" value="check" <?php echo @$check_matrix_multiple;?>/>บังคับให้ตอบคำถามนี้</td>
              </tr>
			  <tr>
                <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/> <?php echo anchor('survey/insert_template','<input type="none" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>');?><input name="chanel" id="chanel" type="hidden" value="<?php echo $arr; ?>" /></td>
              </tr>
            </table>
		<?php echo form_close();?>
        <?php } ?>
        <?php $arr = $this->uri->segment(3);if($_SESSION['temp_all'][$arr]['type']=="single_textbox"){?>
        <?php echo form_open('ci_manage_temp/single_textbox_update')?>
            <table width="90%" align="center">
            <tr>
                <td><strong>ประเภท คำถามคำตอบแบบสั้น</strong></td>
              </tr>
              <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
              <tr>
                <td><input name="question_single_textbox" id="question_single_textbox" type="text" class="k-textbox" style="width:80%" value="<?php echo @$_SESSION['temp_all'][$arr]['question_single_textbox']?>" /></td>
              </tr>
              <tr>
              <?php if(@$_SESSION['temp_all'][$arr]['other_single_textbox']!=""){@$other_single_textbox = 'checked="checked"';}?>
                <td class="table_default"><input name="other_single_textbox" type="checkbox" value="other" <?php echo @$other_single_textbox;?>/>เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
              <?php if(@$_SESSION['temp_all'][$arr]['check_single_textbox']!=""){@$check_single_textbox = 'checked="checked"';}?>
                <td class="table_default"><input name="check_single_textbox" type="checkbox" value="check" <?php echo @$check_single_textbox;?>/>บังคับให้ตอบคำถามนี้</td>
              </tr>
              <tr>
                <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/> <?php echo anchor('survey/insert_template','<input type="none" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>');?><input name="chanel" id="chanel" type="hidden" value="<?php echo $arr; ?>" /></td>
              </tr>
            </table>
		<?php echo form_close();?>
        <?php } ?>
        <?php $arr = $this->uri->segment(3);if($_SESSION['temp_all'][$arr]['type']=="mulitple_textbox"){?>
        <?php echo form_open('ci_manage_temp/mulitple_textbox_update')?>
            <table width="90%" align="center">
            <tr>
                <td><strong>ประเภท คำถามคำตอบแบบสั้นหลายคำตอบ</strong></td>
              </tr>
              <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
              <tr>
                <td><input name="question_mulitple_textbox" id="question_mulitple_textbox" type="text" class="k-textbox" style="width:80%" value="<?php echo @$_SESSION['temp_all'][$arr]['question_mulitple_textbox']?>" /></td>
              </tr>
              <tr>
                <td><strong>คำตอบ</strong></td>
              </tr>
              <tr>
                <td width="70%" >
                <textarea name="answer_mulitple_textbox" id="answer_mulitple_textbox" cols="45" rows="10" class="k-textbox" style="width:100%;"><?php echo @$_SESSION['temp_all'][$arr]['answer_mulitple_textbox']?></textarea>
                </td>
             </tr>
             <tr>
             <?php if(@$_SESSION['temp_all'][$arr]['other_mulitple_textbox']!=""){@$other_mulitple_textbox = 'checked="checked"';}?>
                <td class="table_default"><input name="other_mulitple_textbox" type="checkbox" value="other" <?php echo @$other_mulitple_textbox;?>/>เพิ่มคำตอบเอง</td>
              </tr>
			  <tr>
              <?php if(@$_SESSION['temp_all'][$arr]['check_mulitple_textbox']!=""){@$check_mulitple_textbox = 'checked="checked"';}?>
                <td class="table_default"><input name="check_mulitple_textbox" type="checkbox" value="check" <?php echo @$check_mulitple_textbox;?>/>บังคับให้ตอบคำถามนี้</td>
              </tr>
             <tr>
                <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/> <?php echo anchor('survey/insert_template','<input type="none" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>');?><input name="chanel" id="chanel" type="hidden" value="<?php echo $arr; ?>" /></td>
              </tr>
            </table>
		<?php echo form_close();?>
        <?php } ?>
        <?php $arr = $this->uri->segment(3);if($_SESSION['temp_all'][$arr]['type']=="date_time"){?>
        <?php echo form_open('ci_manage_temp/date_time_update')?>
            <p><table width="90%" align="center">
                        <tr>
                <td><strong>ประเภท วันและเวลา</strong></td>
              </tr>
              <tr>
                <td><strong>คำถาม</strong></td>
              </tr>
              <tr>
                <td><input name="question_date_time" id="question_date_time" type="text" class="k-textbox" style="width:80%" value="<?php echo @$_SESSION['temp_all'][$arr]['question_date_time']?>" /></td>
              </tr>
        <tr>
                <td><strong>คำตอบ</strong></td>
              </tr>
              <tr>
                  <td></td>
        <tr>
                <td width="70%" >
	<textarea name="answer_date_time" id="answer_date_time" cols="45" rows="10" class="k-textbox" style="width:100%;"><?php echo @$_SESSION['temp_all'][$arr]['answer_date_time']?></textarea>
                
                </td>
             </tr>
        <tr>
                <td><input name="submit" id="submit" type="submit" value="บันทึก" class="k-button" style="width:150px;"/> <?php echo anchor('survey/insert_template','<input type="none" name="button3" id="button3" value="ยกเลิก" class="k-button" style="width:150px;"/>');?><input name="chanel" id="chanel" type="hidden" value="<?php echo $arr; ?>" /></td>
              </tr>
            </table>
		<?php echo form_close();?>
        <?php } ?>        
	</div>
    </td>
  </tr>
</table>
<script>
                function isInArray(date, dates) {
                    for(var idx = 0, length = dates.length; idx < length; idx++) {
                        var d = dates[idx];
                        if (date.getFullYear() == d.getFullYear() &&
                            date.getMonth() == d.getMonth() &&
                            date.getDate() == d.getDate()) {
                            return true;
                        }
                    }

                    return false;
                }

                $(document).ready(function() {
                    var today = new Date(),
                        birthdays = [
                           new Date(today.getFullYear(), today.getMonth(), 11),
                           new Date(today.getFullYear(), today.getMonth() + 1, 6),
                           new Date(today.getFullYear(), today.getMonth() + 1, 27),
                           new Date(today.getFullYear(), today.getMonth() - 1, 3),
                           new Date(today.getFullYear(), today.getMonth() - 2, 22)
                        ];

                    $("#bdate").kendoDatePicker({
            format: "yyyy-MM-dd", 
                        value: today,
                        dates: birthdays,
                        month: {
                            // template for dates in month view
                            content: '# if (isInArray(data.date, data.dates)) { #' +
                                         '<div class="birthday"></div>' +
                                     '# } #' +
                                     '#= data.value #'
                        },
                        footer: "Today - #=kendo.toString(data, 'd') #"
                    });

                    $("#bdate").data("kendoDatePicker")
                                    .dateView.calendar.element
                                    .width(300);
                });
            </script>
