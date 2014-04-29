<?php namespace Mandor53\Aware2;

use Illuminate\Database\Eloquent;
use Illuminate\Support\Contracts\MessageProviderInterface;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;

/**
 * Aware Models
 *    Self-validating Eloquent Models
 */
abstract class Model extends Eloquent\Model implements MessageProviderInterface
{

    /**
     * Error message container
     *
     * @var Illuminate\Support\MessageBag
     */
    protected $errorBag;

    /**
     * Temporary message overrides
     *
     * @var array
     */
    protected $message_overrides;

    /**
     * Aware Validation Messages
     *
     * @var array $messages
     */
    public static $messages = array();

    /**
     * Temporary rule overrides
     *
     * @var array
     */
    protected $rule_overrides;

    /**
     * Aware Validation Rules
     *
     * @var array $rules
     */
    public static $rules = array();

    /**
     * Aware Validation function Rules
     *
     * @return bool or string
     */
    public static function dynamicRules($data)
    {
    	return $true;
    }

    /**
     * Setup validation events
     */
    public static function boot()
    {
      parent::boot();

      $class = get_class(new Observer);
      static::registerModelEvent('saving', "$class@saving");
      static::registerModelEvent('saved', "$class@saved");
    }

    /**
     * Returns the errors container
     *
     * @return Illuminate\Support\MessageBag
     */
    public function messages()
    {
        if (!$this->errorBag) {
            $this->errorBag = new MessageBag();
        }
        return $this->errorBag;
    }

    /**
     * Returns the errors container
     *
     * @return Illuminate\Support\MessageBag
     */
    public function getMessageBag()
    {
        return $this->errors();
    }

    /**
     * Get an array of messages for the next save
     *
     * @return array
     */
    public function getMessages()
    {
      return array_merge(
        static::$messages,
        $this->message_overrides ?: array()
      );
    }

    /**
     * Get an array of rules for the next save
     *
     * @return array
     */
    public function getRules($data=null)
    {
      $rules = array_merge(
        static::$rules,
        $this->rule_overrides ?: array()
      );
      return $data ? array_intersect_key($rules, $data) : $rules;
    }

    /**
     * Validate the Model
     *    runs the validator and binds any errors to the model
     *
     * @param array $rules
     * @param array $messages
     * @return bool
     */
    public function isValid()
    {
      $valid = true;
      $data = array_merge($this->getOriginal(), $this->getDirty());
      $rules = $this->exists ?
        $this->getRules($data) :
        $this->getRules();
      if ($rules) {
        $validator = Validator::make(
          $data,
          $rules,
          $this->getMessages()
        );
        $valid = $validator->passes();
      }

      if (!$valid) {
        $this->errorBag = $validator->errors();
      } elseif ($this->errorBag && $this->errorBag->any()) {
        $this->errorBag = new MessageBag();
      }

      $resultTest = $this->dynamicRules($data);
      if($resultTest !== true)
      {
      	if(!$this->errorBag)
      	{
      		$this->errorBag = new MessageBag();
      	}
      	$this->errorBag->add('dynamicTest', $resultTest);
      	$valid = false;
      }

      return $valid;
    }

    /**
     * Clears the force-save flag
     *
     * @return Awareness\Aware
     */
    public function clearForce()
    {
      $this->forceSave = false;
      return $this;
    }

    /**
     * Clears message & rule overrides
     *
     * @return Awareness\Aware
     */
    public function clearOverrides()
    {
      $this->message_overrides = null;
      $this->rule_overrides = null;
      return $this;
    }

    /**
     * Perform next save without validating
     *
     * @return Awareness\Aware
     */
    public function force()
    {
      $this->forceSave = true;
      return $this;
    }

    /**
     * Returns true if forced flag is set
     *
     * @return bool
     */
    public function isForced()
    {
      return $this->forceSave;
    }

    /**
     * Set message overrides for the next save
     *
     * @return Awareness\Aware
     */
    public function overrideMessages($messages)
    {
      $this->message_overrides = $messages;
      return $this;
    }

    /**
     * Set rule overrides for the next save
     *
     * @return Awareness\Aware
     */
    public function overrideRules($rules)
    {
      $this->rule_overrides = $rules;
      return $this;
    }

    /**
     * Add a new custom error
     *
     * @return Mandor53\Aware
     */
    public function addError($message)
    {
    	$this->errors[] = $message;
    }

}