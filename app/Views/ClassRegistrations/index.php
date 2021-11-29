<?= $this->extend("layouts/default") ?>

<?= $this->section('title') ?><?= lang('ClassRegistrations.title') ?><?= $this->endSection() ?>

<?= $this->section("content") ?>

<?php $currentPage='classRegistration' ?>



          <div class="card">
            <h1 class="card-header">Ihre Klassen</h1>

            <div class="card-body">

              <div class="pb-2">
                  <a type="button" class="btn btn-outline-primary" href="<?= site_url("/classRegistrations/new") ?>">Neue Klasse</a>
                  <label for="query">Suchen</label>
                  <input name="query" id="query">
              </div>

              <?php if ($classRegistrations): ?>

                <?php $totalStudents=0?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align: center; vertical-align: middle;">Klasse</th>
                            <th style="text-align: center; vertical-align: middle;">Beschreibung</th>
                            <th style="text-align: center; vertical-align: middle;">Anzahl d. SchülerInen</th>
                            <th style="text-align: center; vertical-align: middle;"></th>
                            <th style="text-align: center; vertical-align: middle;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($classRegistrations as $classRegistration): ?>

                            <tr>
                                <td style="text-align: center; vertical-align: middle;"><?= esc($classRegistration->class) ?></td>
                                <td style="text-align: center; vertical-align: middle;"><?= esc($classRegistration->class_description) ?></td>
                                <td style="text-align: center; vertical-align: middle;"><?= $classRegistration->number_of_students ?></td>
                                <td style="text-align: center; vertical-align: middle;"><a class="btn btn-outline-primary" href="<?= site_url("/classRegistrations/edit/" . $classRegistration->id) ?>">
                                    Editieren
                                </a></td>
                                <td style="text-align: center; vertical-align: middle;"><a class="btn btn-outline-danger" href="<?= site_url("/classRegistrations/delete/" . $classRegistration->id) ?>">
                                    Löschen
                                </a></td>
                            </tr>
                            <?php $totalStudents= $totalStudents+$classRegistration->number_of_students ?>
                        <?php endforeach; ?>
                        <td colspan="2">Gesamtanzahl d. SchülerInnen</td>
                        <td style="text-align: center; vertical-align: middle;"><?= $totalStudents ?></td>
                        <th style="text-align: center; vertical-align: middle;"></th>
                        <th style="text-align: center; vertical-align: middle;"></th>

                    </tbody>
                </table>


            <?= $pager->simplelinks() ?>

        <?php else: ?>
        </div>

    </div>

        <p><?= lang('ClassRegistrations.no_classRegistrations_found') ?>.</p>

    <?php endif; ?>

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
