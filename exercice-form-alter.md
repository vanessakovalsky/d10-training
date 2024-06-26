# Envoi d’email à partir des données de l'entité

Cet exercice a pour objectif :
* de modifier un formulaire existant
* de retrouver des données avec l'API des entités 


## Modifier le formulaire pour envoyer un email au propriétaire en cas de modification de la fiche de son bateau 
* Dans le fichier monmodule.module, nous allons ajouter un hook pour modifier le formulaire et appeler une nouvelle fonction qui sera en charge d'envoyer un mail au propriétaire du bateau.
```
function boatmanagement_form_node_bateau_edit_form_alter(&$form, &$form_state, $form_id){
    $form['actions']['submit']['#submit'][] = 'bateau_edit_send_email';
}
```
* Puis nous déclarons dans le même fichier la fonction appelée :
```
function bateau_edit_send_email(&$form, &$form_state){
  //On charge le service d'envoi de mail
  $mailer = \Drupal::service('plugin.manager.mail');
  // On récupère la langue de l'utilisateur cournat
  $langcode = \Drupal::languageManager()->getCurrentLanguage()->getId();
  // On récupère le nom du site dans la config pour le mettre dans le sujet du mail
  $site_name = \Drupal::config('system.site')->get('name');
  //On récupère l'utilisateur actuellement connecté
  $current_user = \Drupal::currentUser();
  $expediteur = $current_user->getEmail();
  //On construit le tableau avec les paramètres pour l'envoi du mail
  $subject = t('Modification de votre fiche bateau');
  $content = t('Votre fiche de bateau a été modifiée');
  $params = array(
    'message' => $content,
    'subject' => $site_name.$subject,
  );

  //On récupère le noeud por trouver le propriétaire du bateau qui a été modifié
  $node = Node::load($form_state->getValue('nid'));

  //Le champ propriétaire contient une référence vers une entité User, il faut donc la chargé pour récupérer le mail du propriétaire
  /** @var \Drupal\Core\Field\Plugin\Field\FieldType\EntityReferenceItem $referenceItem */
  $referenceItem = $node->get('field_proprietaire')->first();

  /** @var \Drupal\Core\Entity\Plugin\DataType\EntityReference $entityReference */
  $entityReference = $referenceItem->get('entity');

  /** @var \Drupal\Core\Entity\Plugin\DataType\EntityAdapter $entityAdapter */
  $entityAdapter = $entityReference->getTarget();

  /** @var \Drupal\Core\Entity\EntityInterface $referencedEntity */
  $proprietaire = $entityAdapter->getValue();

  $destinataire = $proprietaire->getEmail();
  //On envoie le mail avec toutes les infos dont on a besoin
  $mailer->mail('boatmanagement', 'bateau_edit_send_email', $destinataire, $langcode, $params, $expediteur, $send=TRUE );
}
```
* Assurez vous que le nom des champs utilisé dans le code donné en exemple corresponde au nom des champs que vous utilisez dans votre module

* Il nous reste une étape avant de tester, pour fonctionner le service mailer de Drupal a besoin d'un template d'email, celui-ci est définit dans une fonction hook_mail à ajouter à votre fichier .module

```
function boatmanagement_mail($key, &$message, $params) {
  switch ($key) {
    case 'bateau_edit_send_email':
      $message['subject'] = $params['subject'];
      $message['body'][] = $params['message'];
      break;
  }
}
```

* Si votre environnement est configuré pour l'envoi des mails, vous pouvez modifier un noeud et mettre un propriétaire pour tester, vous pouvez aussi utiliser des modules comme mailsystem et mailhog pour vos environnements de développement, afin de tester vos envois d'email sans besoin de serveur SMTP.

-> Félicitations, vous savez maintenant modifier un formulaire existant, déclarer une permission et utiliser l'API des entités pour retrouver des données
