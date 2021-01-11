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
            <div class="mt-5">
                <h1>Dashboard</h1>
                <figure class="card">
                    <p>Poids Moyen <span class="text-secondary">de la 4ème génération:</span></p>
                    <?php 
                        $pokemons = TableRegistry::getTableLocator()->get('pokemons');
                        $query = $pokemons->find('all');
                        $query  ->select(['avg'=>$query->func()->avg('weight')])
                                ->where(['pokemons.Id BETWEEN 387 AND 493']);
                        foreach ($query as $row) {
                            $poids=$row->avg;
                        }
                        echo "<h1>$poids</h1>";
                    ?>
                </figure>
                <figure class="card mt-5">
                    <p>Nombre de pokémon de type Fées <span class="text-secondary">pour les générations 1,3 et 7:</span></p>
                    <?php 
                        //Requete pour la génération 1
                        $pokemons = TableRegistry::getTableLocator()->get('pokemons');
                        $query1 = $pokemons->find('all');
                        $query1  ->select(['count'=>$query1->func()->count('pokemons.id')])
                                 ->join([
                                    'types' => [
                                    'table' => 'pokemon_types',
                                    'type' => 'INNER',
                                    'conditions' => 'types.pokemon_id = pokemons.id'],])
                                ->where(['pokemons.Id BETWEEN 1 AND 151'])
                                ->andWhere(['types.type_id=10']);
                                        
                        foreach ($query1 as $row) {
                            $count1= $row->count;
                         }
                        //Requete pour la génération 3
                        $pokemons = TableRegistry::getTableLocator()->get('pokemons');
                        $query3 = $pokemons->find('all');
                        $query3  ->select(['count'=>$query3->func()->count('pokemons.id')])
                                 ->join([
                                    'types' => [
                                    'table' => 'pokemon_types',
                                    'type' => 'INNER',
                                    'conditions' => 'types.pokemon_id = pokemons.id'],])
                                ->where(['pokemons.Id BETWEEN 252 AND 386'])
                                ->andWhere(['types.type_id=10']);
        
                        foreach ($query3 as $row) {
                            $count2=$row->count;
                         }
                        //Requete pour la génération 7
                        $pokemons = TableRegistry::getTableLocator()->get('pokemons');
                        $query7 = $pokemons->find('all');
                        $query7  ->select(['count'=>$query7->func()->count('pokemons.id')])
                                 ->join([
                                    'types' => [
                                    'table' => 'pokemon_types',
                                    'type' => 'INNER',
                                    'conditions' => 'types.pokemon_id = pokemons.id'],])
                                ->where(['pokemons.Id BETWEEN 722 AND 809'])
                                ->andWhere(['types.type_id=10']);
        
                        foreach ($query7 as $row) {
                            $count3= $row->count;
                         }
                         $res=$count1+$count2+$count3;
                         echo "<h1>$res</h1>";
                    ?>
                </figure>
            </div>
            <div class="related mt-5">
                <div class="table-responsive">
                    <table>
                        <?php 
                            $pokemons = TableRegistry::getTableLocator()->get('pokemons');

                            $query = $pokemons->find('all');
                            $query  ->select('name')
                                    ->join([
                                        'stats' => [
                                        'table' => 'pokemon_stats',
                                        'type' => 'INNER',
                                        'conditions' => 'stats.pokemon_id = pokemons.id'],])
                                    ->Where(['stats.stat_id=6'])
                                    ->limit(10)
                                    ->order(['stats.value'=>'DESC']);
                        ?>
                        <tr>
                            <th><?= __('Pokémon') ?></th>
                            <th><?= __('Rang') ?></th>
                        </tr>
                        <?php 
                            $count=0;
                            foreach($query as $row){ 
                                $count++;
                                echo "<tr><td>$row->name</td><td>n°$count<td><tr>";
                            } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>