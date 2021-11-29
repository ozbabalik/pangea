<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?><?= lang('ClassRegistrations.title') ?><?= $this->endSection() ?>

<?= $this->section("content") ?>
    <div class="container">
      <div class="col-10">
          <div class="card">
            <h1 class="card-header"><?= lang('ClassRegistrations.title') ?></h1>

            <div class="card-body">

              <div>
                  <a type="button" class="btn btn-outline-primary" href="<?= site_url("/classRegistrations/new") ?>"><?= lang('ClassRegistrations.new') ?></a>
                  <label for="query"><?= lang('ClassRegistrations.search') ?></label>
                  <input name="query" id="query">
              </div>

              <?php if ($classRegistrations): ?>

                <?php $totalStudents=0?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;"><?= lang('ClassRegistrations.class') ?></th>
                            <th style="text-align: center; vertical-align: middle;"><?= lang('ClassRegistrations.class_description') ?></th>
                            <th style="text-align: center; vertical-align: middle;"><?= lang('ClassRegistrations.number_of_students') ?></th>
                            <th style="text-align: center; vertical-align: middle;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($classRegistrations as $classRegistration): ?>

                            <tr>
                                <td style="text-align: center; vertical-align: middle;"><?= esc($classRegistration->class) ?></td>
                                <td style="text-align: center; vertical-align: middle;"><?= esc($classRegistration->class_description) ?></td>
                                <td style="text-align: center; vertical-align: middle;"><?= $classRegistration->number_of_students ?></td>
                                <td style="text-align: center; vertical-align: middle;"><a class="btn btn-secondary" href="<?= site_url("/classRegistrations/edit/" . $classRegistration->id) ?>">
                                    <?= lang("ClassRegistrations.edit") ?>
                                </a></td>
                            </tr>
                            <?php $totalStudents= $totalStudents+$classRegistration->number_of_students ?>
                        <?php endforeach; ?>
                        <td colspan="2"><?= lang('ClassRegistrations.total_number_of_Students') ?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $totalStudents ?></td>

                    </tbody>
                </table>


            <?= $pager->simplelinks() ?>

        <?php else: ?>
    </div>
    </div>
    </div>

        <p><?= lang('ClassRegistrations.no_classRegistrations_found') ?>.</p>

    <?php endif; ?>
</div>
    <script src="<?= site_url('/js/auto-complete.min.js') ?>"></script>

    <script>
        var searchUrl = "<?= site_url('/classRegistrations/search?q=') ?>";
        var showUrl = "<?= site_url('/classRegistrations/show/') ?>";
        var data;
        var i;

        var searchAutoComplete = new autoComplete({
            selector: 'input[name="query"]',
            cache: false,
            source: function(term, response) {

                var request = new XMLHttpRequest();

                request.open('GET', searchUrl + term, true);

                request.onload = function() {

                    data = JSON.parse(this.response);

                    i = 0;

                    var suggestions = data.map(classRegistration => classRegistration.class_description);

                    response(suggestions);
                };

                request.send();
            },
            renderItem: function (item, search) {

                var id = data[i].id;

                i++;

                return '<div class="autocomplete-suggestion" data-id="' + id + '">' + item + '</div>';
            },
            onSelect: function(e, term, item){

                window.location.href = showUrl + item.getAttribute('data-id');

            }
        });

    </script>

<?= $this->endSection() ?>
