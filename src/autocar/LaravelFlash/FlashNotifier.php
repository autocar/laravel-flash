<?php namespace autocar\LaravelFlash;

use autocar\LaravelFlash\Contracts\SessionStore;

class FlashNotifier
{
    /**
     * The session writer.
     *
     * @var SessionStore
     */
    private $session;

    /**
     * Create a new flash notifier instance.
     *
     * @param SessionStore $session
     */
    public function __construct(SessionStore $session)
    {
        $this->session = $session;
    }

    /**
     * Flash a success message.
     *
     * @param  string $message
     * @param  string $title
     * @return $this
     */
    public function success($message, $title = null)
    {
        $this->message($message, 'success', $title);

        return $this;
    }

    /**
     * Flash an information message.
     *
     * @param  string $message
     * @param  string $title
     * @return $this
     */
    public function info($message, $title = null)
    {
        $this->message($message, 'info', $title);

        return $this;
    }

    /**
     * Flash a warning message.
     *
     * @param  string $message
     * @param  string $title
     * @return $this
     */
    public function warning($message, $title = null)
    {
        $this->message($message, 'warning', $title);

        return $this;
    }

    /**
     * Flash an error message.
     *
     * @param  string $message
     * @param  string $title
     * @return $this
     */
    public function error($message, $title = null)
    {
        $this->message($message, 'danger', $title);

        return $this;
    }

    /**
     * Add an "important" flash to the session.
     *
     * @return $this
     */
    public function important()
    {
        $this->session->flash('flash_notification.important', true);

        return $this;
    }

    /**
     * Flash an overlay modal.
     *
     * @param  string $message
     * @param  string $title
     * @return $this
     */
    public function overlay($message, $title = 'Notice')
    {
        $this->message($message, 'info', $title, true);

        return $this;
    }

    /**
     * Flash a general message.
     *
     * @param  string  $message
     * @param  string  $level
     * @param  string  $notice
     * @param  boolean $overlay
     * @return $this
     */
    public function message($message, $level = 'info', $title = 'Notice', $overlay = false)
    {
        $this->session->flash('flash_notification.messages', compact('message', 'level', 'title', 'overlay'));

        return $this;
    }
}
