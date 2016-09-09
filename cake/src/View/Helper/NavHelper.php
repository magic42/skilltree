<?php
/* src/View/Helper/NavHelper.php */
namespace App\View\Helper;

use Cake\View\Helper;

class NavHelper extends Helper
{

    public $helpers = ['Html', 'Form'];

    /**
     * Generating side menu
     * Supporting case when we have an object
     *  allowed structure $params = ['actions' => [values], 'id' => value1]
     *
     * @param array $params
     * @return string
     */
    public function display($params = array())
    {
        $navBar = '<nav class="large-3 medium-4 columns" id="actions-sidebar">';
        $navBar .= '<ul class="side-nav">';

        /**
         * Validating params array
         * Forming li elements based on action, in case of delete action adding confirm message
         */
        if($this->validateActionsParams($params)) {
            $navBar .= '<li class="heading ">' . __("Actions") . '</li>';
            $navBar .= '<li role="separator" class="divider"></li>';
            foreach($params['actions'] as $action) {

                if($action == 'edit') {
                    $navBar .= '<li class="bg-info">' . $this->Html->link(__('Edit'), ['action' => 'edit', $params['id']]) . '</li>';
                } else if($action == 'delete') {
                    $navBar .= '<li class="bg-warning">' . $this->Form->postLink(
                        __('Delete'),
                        ['action' => 'delete', $params['id']],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $params['id'])]
                    ) . '</li>';
                }
            }
            $navBar .= '<li role="separator" class="divider"></li><br/>';
        }

        $navBar .= '<li class="heading">' . __("Elements") . '</li>';
        $navBar .= '<li role="separator" class="divider"></li>';

        $navBar .= $this->generateLiLinkElement('List Skills', ['controller' => 'Skills', 'action' => 'index']);
        $navBar .= $this->generateLiLinkElement('New Skill', ['controller' => 'Skills', 'action' => 'add']);
        $navBar .= '<li role="separator" class="divider"></li>';

        $navBar .= $this->generateLiLinkElement('List Talents', ['controller' => 'Talents', 'action' => 'index']);
        $navBar .= $this->generateLiLinkElement('New Talent', ['controller' => 'Talents', 'action' => 'add']);
        $navBar .= '<li role="separator" class="divider"></li>';

        $navBar .= $this->generateLiLinkElement('List Links', ['controller' => 'Links', 'action' => 'index']);
        $navBar .= $this->generateLiLinkElement('New Link', ['controller' => 'Links', 'action' => 'add']);
        $navBar .= '<li role="separator" class="divider"></li>';

        $navBar .= $this->generateLiLinkElement('List Ranks', ['controller' => 'Ranks', 'action' => 'index']);
        $navBar .= $this->generateLiLinkElement('New Rank', ['controller' => 'Ranks', 'action' => 'add']);
        $navBar .= '<li role="separator" class="divider"></li>';

        $navBar .= $this->generateLiLinkElement('List Nodes', ['controller' => 'SkillsTree', 'action' => 'index']);
        $navBar .= $this->generateLiLinkElement('New Node', ['controller' => 'SkillsTree', 'action' => 'add']);
        $navBar .= '<li role="separator" class="divider"></li>';

        $navBar .= $this->generateLiLinkElement('List Stats', ['controller' => 'Stats', 'action' => 'index']);
        $navBar .= $this->generateLiLinkElement('New Stat', ['controller' => 'Stats', 'action' => 'add']);
        $navBar .= '<li role="separator" class="divider"></li>';

        $navBar .= $this->generateLiLinkElement('List Users', ['controller' => 'Users', 'action' => 'index']);
        $navBar .= $this->generateLiLinkElement('New User', ['controller' => 'Users', 'action' => 'add']);
        $navBar .= '<li role="separator" class="divider"></li>';

        $navBar .= '</ul>';
        $navBar .= '</nav>';

        return $navBar;
    }

    /**
     * Generating li with link inside by giving text and additional params for link helper
     *
     * @param string $text
     * @param array $params
     * @return string
     */
    private function generateLiLinkElement($text, $params = array())
    {
        return '<li>' . $this->Html->link(_($text), $params) . '</li>';
    }

    /**
     * Checking if we have actions array and id to generate link regarding add/edit/delete of certain object
     *
     * @param array $params
     * @return bool
     */
    private function validateActionsParams($params= array())
    {
        if(
            array_key_exists('actions', $params) && !empty($params['actions']) &&
            array_key_exists('id', $params) && !empty($params['id'])
        ) {
            return true;
        }
        return false;
    }
}
