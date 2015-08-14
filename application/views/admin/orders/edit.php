<div class="container">
    <div class="row">
        <div class="span12">
            <div class="widget">
                <div class="widget-header">
                    <i class="icon-road"></i>
                    <h3>Détails de la commande N°<?php echo $order[0]->id ?></h3>
                    <?php if($order[0]->statut == 'Reçu'): ?>
                        <a href="<?php echo base_url(''); ?>admin/orders/facturer?id=<?php echo $order[0]->id ?>" id="bouton_header" role="button" class="btn" data-toggle="">Facturer</a>
                        <a href="<?php echo base_url(''); ?>admin/orders/accompte?id=<?php echo $order[0]->id ?>" id="bouton_header" role="button" class="btn" data-toggle="">Accompte versé</a>            
                    <?php endif; ?>
                    <?php if($order[0]->statut == 'Accompte versé'): ?>
                        <a href="<?php echo base_url(''); ?>admin/orders/facturer?id=<?php echo $order[0]->id ?>" id="bouton_header" role="button" class="btn" data-toggle="">Facturer</a>
                    <?php endif; ?>
                    <a href="<?php echo base_url(''); ?>admin/orders/annuler?id=<?php echo $order[0]->id ?>" id="bouton_header" role="button" class="btn" data-toggle="">Annuler</a>
                    <a href="<?php echo base_url(''); ?>admin/orders/liste" id="bouton_header" role="button" class="btn" data-toggle="">Retour</a>
                </div>
                <div class="widget-content">

                    <div class="bloc_commande right">
                        <h4>Inforamtion de la commande N°<?php echo $order[0]->id ?></h4>
                        <p>Date de la commmande : <span><?php echo $order[0]->date ?></span></p>
                        <p>Placé depuis l'IP : <span><?php echo $order[0]->ip ?></span></p>
                        <p>Statut de la commande : <span><?php echo $order[0]->statut ?></span></p>
                    </div>

                    <div class="bloc_commande">
                        <h4>Inforamtion du compte</h4>
                        <p>Nom du client : <span><?php echo $order[0]->id_utilisateur[0]->nom.' '.$order[0]->id_utilisateur[0]->prenom ?></span></p>
                        <p>Email : <span><?php echo $order[0]->id_utilisateur[0]->mail ?></span></p>
                        <p>Date d'inscription : <span><?php echo explode(' ', $order[0]->id_utilisateur[0]->date_inscription)[0] ?></span></p>
                    </div>

                    <div class="clear"></div>

                    <div class="bloc_commande factu right">
                        <h4>Adresse de facturation</h4>
                        <p><?php echo $order[0]->id_billing[0]->nom.' '.$order[0]->id_billing[0]->prenom ?></p>
                        <p><?php echo $order[0]->id_billing[0]->adresse.' '.$order[0]->id_billing[0]->complement_adresse ?></p>
                        <p><?php echo $order[0]->id_billing[0]->ville.', '.$order[0]->id_billing[0]->code_postal ?></p>
                        <p><?php echo $order[0]->id_billing[0]->pays ?></p>
                        <p>T :<?php echo $order[0]->id_billing[0]->telephone ?></p>
                    </div>

                    <div class="bloc_commande">
                        <h4>Information sur le paiement</h4>
                        <p><?php echo $order[0]->payment ?></p>
                    </div>

                    <div class="clear"></div>

                    <div class="bloc_commande parti">
                        <h4>Voyage</h4>
                        <p>Nom du voyage : <span><?php echo $order[0]->id_voyage[0]->titre ?></span></p>
                        <p>Date de départ : <span><?php echo $order[0]->id_info_voyage[0]->date_depart ?></span></p>
                        <p>Date d'arrivée : <span><?php echo $order[0]->id_info_voyage[0]->date_arrivee ?></span></p>
                    </div>

                    <div class="bloc_commande parti">
                        <h4>Liste des participants</h4>
                        <table>
                        <tr><th>Nom</th><th>Prénom</th><th>Date d'anniversaire</th><th>Commentaire</th></tr>
                        <?php foreach ($order[0]->nb_participant as $p): ?>
                            <tr>
                                <td><?php echo $p->nom; ?></td>
                                <td><?php echo $p->prenom; ?></td>
                                <td><?php echo $p->dob; ?></td>
                                <td><?php echo $p->info; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </table>
                    </div>

                    <div class="clear"></div>

                    <div class="bloc_commande totaux">
                        <h4>Totaux commande</h4>
                        <p>Sous total : <span><?php echo $order[0]->sous_total ?></span></p>
                        <p>Taxe : <span><?php echo $order[0]->taxe ?></span></p>
                        <p>Total général (T.T.C) : <span><?php echo $order[0]->prix_total ?></span></p>
                        <p>Accompte : <span><?php echo $order[0]->acompte ?></span></p>
                        <p>Reste à payer : <span><?php echo $order[0]->reste_a_payer ?></span></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>







