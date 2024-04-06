<?php&#10/**&#10 * @file&#10 * contains \Drupal\custom\Annotation\Sandwich&#10 * Provides an example of how to define a new annotation type for use in&#10 * defining a plugin type. Demonstrates documenting the various properties that&#10 * can be used in annotations for plugins of this type.&#10 */&#10namespace Drupal\custom\Annotation;&#10&#10use Drupal\Component\Annotation\Plugin;&#10/**&#10 * Defines a Sandwich annotation object.&#10 *&#10 * @see \Drupal\custom\SandwichPluginManager&#10 * @see plugin_api&#10 *&#10 * Note that the "@ Annotation" line below is required and should be the last&#10 * line in the docblock. It's used for discovery of Annotation definitions.&#10 *&#10 * @Annotation&#10 */&#10&#10class Sandwich extends Plugin {&#10  /**&#10   * The plugin ID&#10   * @var string&#10   */&#10  public $id;&#10&#10  /**&#10   * A brief, human-readable, description of the sandwich type.&#10   *&#10   * This property is designated as being translatable because it will appear&#10   * in the user interface. This provides a hint to other developers that they&#10   * should use the Translation() construct in their annotation when declaring&#10   * this property.&#10   *&#10   * @var \Drupal\Core\Annotation\Translation&#10   *&#10   * @ingroup plugin_translatable&#10   */&#10  public $description;&#10&#10  /**&#10   * The number of calories per serving of this sandwich type.&#10   *&#10   * This property is a float value, so we indicate that to other developers&#10   * who are writing annotations for a Sandwich plugin.&#10   *&#10   * @var int&#10   */&#10  public $calories;&#10}&#10&#10