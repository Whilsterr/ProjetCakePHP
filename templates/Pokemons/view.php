<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon $pokemon
 */
?>
<style>
    .conteneur{
        text-align: center;
        display: table-cell;
         vertical-align: middle;
    }
</style>

<div class="row">
    <div class="column-responsive column-80">
        <div class="pokemons view content">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-sm conteneur">
                        <img style="height:150px; width:150px" src="<?= h($pokemon->default_front_sprite_url) ?>"></img>                
                    </div>
                    <div class="col-sm">
                         <h3 class=""><?= h($pokemon->name) ?></h3>
                         <div class="related mt-5">
                            <?php if (!empty($pokemon->pokemon_types)) : ?>
                            <div class="card__caption">
                                <h3 class="card__type card--<?= $pokemon->first_type ?>">
                                    <?= $pokemon->first_type ?>
                                </h3>
                                <?php if ($pokemon->has_second_type) : ?>
                                <h3 class=" card__second_type card--<?= $pokemon->second_type ?>">
                                    <?= $pokemon->second_type ?>
                                </h3>
                        <?php endif ?>
                    </div>
                <?php endif; ?>
                         <div class="related">
                            <?php if (!empty($pokemon->pokemon_stats)) : ?>
                                <div class="table-responsive">
                                    <table>
                                         <?php foreach ($pokemon->pokemon_stats as $pokemonStats) : ?>
                                        <tr>
                                            <td>
                                                <?= h($pokemonStats->stat->name) ?>
                                            </td>
                                            <td><?= h($pokemonStats->value) ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                     </div>
                 </div>
            </div>
            <div id="view" class="carousel slide card--<?= $pokemon->first_type ?> mt-5" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src=" <?= h($pokemon->default_front_sprite_url) ?>" class="d-block"></img>
                        </div>
                        <div class="carousel-item">
                            <img src="<?= h($pokemon->default_back_sprite_url) ?>" class="d-block"></img>
                        </div>
                        <div class="carousel-item">
                            <img src="<?= h($pokemon->shiny_front_sprite_url) ?>" class="d-block"></img>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#view" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#view" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>