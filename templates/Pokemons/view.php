<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon $pokemon
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="pokemons view content">
            <h3><?= h($pokemon->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Default Front Sprite Url') ?></th>
                    <td><?= h($pokemon->default_front_sprite_url) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Pokemon Stats') ?></h4>
                <?php if (!empty($pokemon->pokemon_stats)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Stat') ?></th>
                                <th><?= __('Value') ?></th>
                            </tr>
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
            <div class="related">
                <h4><?= __('Related Pokemon Types') ?></h4>
                <?php if (!empty($pokemon->pokemon_types)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Type') ?></th>
                            </tr>
                            <?php foreach ($pokemon->pokemon_types as $pokemonTypes) : ?>
                                <tr>
                                    <td><?= h($pokemonTypes->type->name) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>