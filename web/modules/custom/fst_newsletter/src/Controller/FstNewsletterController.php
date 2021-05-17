<?php

namespace Drupal\fst_newsletter\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for FST Newsletter routes.
 */
class FstNewsletterController extends ControllerBase {

  /**
   * Builds the response.
   * 
   * @return array
   *   The rendered array.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

  /**
   * Builds the argumented response.
   * 
   * @param 
   * 
   * @return array
   *   The rendered array.
   */

  public function buildArgumented($arg) {
    // Make sure you don't trust the URL to be safe! Always check for exploits.
    if (is_numeric($arg)) {
      // We will just show a standard "access denied" page in this case.
      throw new AccessDeniedHttpException();
    }

      $list[] = $this->t("Welcome, @string.", ['@string' => $arg]);
      $list[] = $this->t('You can visit your profile by visiting the link <a href=":api">Profile!!</a>', array(':api' => 'http://localhost:32773/user/1'));
      $list[] = $this->t('You can edit the profile <a href=":api">Edit Profile</a>', array(':api' => 'http://localhost:32773/user/1/edit'));

    // else {
    //   $list[] = $this->t('No user found, create a new user <a href=":api">Create new account</a>', array(':api' => 'http://localhost:32773/user/register'));
    // }

    $render_array['page_example_arguments'] = [
      // The theme function to apply to the #items.
      '#theme' => 'item_list',
      // The list itself.
      '#items' => $list,
      '#title' => $this->t('Hi, @string', ['@string' => $arg]),
    ];
    return $render_array;

  }

}
