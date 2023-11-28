<?php 

namespace Drupal\configapi\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\configapi\ConfigAPIInterface;

/**
 * Defines the ConfigAPI entity.
 *
 * @ConfigEntityType(
 *   id = "configapi",
 *   label = @Translation("Config API"),
 *   handlers = {
 *     "list_builder" = "Drupal\configapi\Controller\ConfigAPIListBuilder",
 *     "form" = {
 *       "add" = "Drupal\configapi\Form\ConfigAPIForm",
 *       "edit" = "Drupal\configapi\Form\ConfigAPIForm",
 *       "delete" = "Drupal\configapi\Form\ConfigAPIDeleteForm",
 *     }
 *   },
 *   config_prefix = "configapi",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "url",
 *     "api_key"
 *   },
 *   links = {
 *     "edit-form" = "/admin/config/system/configapi/{configapi}",
 *     "delete-form" = "/admin/config/system/configapi/{configapi}/delete",
 *   }
 * )
 */
class ConfigAPI extends ConfigEntityBase implements ConfigAPIInterface {

  /**
   * The ConfigAPI ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The ConfigAPI label.
   *
   * @var string
   */
  protected $label;

    /**
   * The ConfigAPI url.
   *
   * @var string
   */
  public $url;

    /**
   * The ConfigAPI apikey.
   *
   * @var string
   */
  public $api_key;

  public function getUrl(){
    return $this->url;
  }

  public function getApiKey(){
    return $this->api_key;
  }



}

