<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pokemon[]|\Cake\Collection\CollectionInterface $pokemons
 */

use Cake\Database\Query;
use Cake\ORM\TableRegistry;
use PhpParser\Node\Stmt\Echo_;

?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="pokemons view content">
            <div>
                <h1>Dashboard</h1>
                <figure class="card">
                    <p>Poids Moyen</p>

                </figure>
                <figure class="card">
                    <p>Nombre de pokémon de type Fées</p>
                    <?php
                    $count = 0;
                    $count1 = 0;
                    $count2 = 0;
                    $pokemons = TableRegistry::getTableLocator()->get('pokemon_types');
                    $query = $pokemons->find();
                    $query->select('type_id')
                        ->from('pokemon_types')
                        ->where(['type_id' => 10])
                        ->andWhere([
                            'pokemon_id > ' => 1,
                            'pokemon_id <' => 151
                        ]);
                    foreach ($query as $type_id) {
                        $count++;
                    }
                    $pokemons = TableRegistry::getTableLocator()->get('pokemon_types');
                    $query1 = $pokemons->find();
                    $query1->select('type_id')
                        ->from('pokemon_types')
                        ->where(['type_id' => 10])
                        ->andWhere([
                            'pokemon_id > ' => 252,
                            'pokemon_id <' => 386
                        ]);
                    foreach ($query1 as $type_id) {
                        $count1++;
                    }
                    $pokemons = TableRegistry::getTableLocator()->get('pokemon_types');
                    $query2 = $pokemons->find();
                    $query2->select('type_id')
                        ->from('pokemon_types')
                        ->where(['type_id' => 10])
                        ->andWhere([
                            'pokemon_id > ' => 722,
                            'pokemon_id <' => 809
                        ]);
                    foreach ($query2 as $type_id) {
                        $count2++;
                    }
                    $res = $count + $count1 + $count2;
                    echo "<h1>$res</h1>";
                    ?>
                </figure>
            </div>
            <div class="related">
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Stat') ?></th>
                            <th><?= __('Value') ?></th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>