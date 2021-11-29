<div class="row mb-3">
    <label class="col-sm-6 col-form-label" for="class">Schulstufe</label>
    <div class="col-sm-6">
  <?php
  $classes = [
    ''  => '--Klasse wählen--',
    '3'  => lang('3. grade'),
    '4'  => lang('4. grade'),
    '5'  => lang('5. grade'),
    '6' => lang('6. grade'),
    '7' => lang('7. grade'),
    '8' => lang('8. grade'),
    '9' => lang('9. grade'),
    '10' => lang('10. grade')
    ];
    echo form_dropdown('class', $classes, esc($classRegistration->class));
    ?>

    <!-- <select class="dropdown" type="text" name="class" id="class">
      <!--?php for(i=3; i<11; i++){?>
    <option value="<!--?= old('class', esc($classRegistration->class)) ?>"> </option>

          <!--?}?>
         </select> -->
</div>
</div>


  <div class="row mb-3">
    <label class="col-sm-6 col-form-label" for="class_description">Beschreibung (z.B: 3B, 4A usw...)</label>
    <div class="col-sm-6">
    <input class="input" type="text" name="class_description" id="class_description"
           value="<?= old('class_description', esc($classRegistration->class_description)) ?>">
         </div>
</div>

<div class="row mb-3">
    <label class="col-sm-6 col-form-label" for="number_of_students"><?= lang('Anzahl der SchülerInnen') ?></label>
    <div class="col-sm-6">
    <input class="input" type="text" name="number_of_students" id="number_of_students"
           value="<?= old('number_of_students', esc($classRegistration->number_of_students)) ?>">
         </div>
</div>
