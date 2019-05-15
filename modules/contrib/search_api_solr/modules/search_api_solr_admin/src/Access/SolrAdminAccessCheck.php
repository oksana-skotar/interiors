<?php

namespace Drupal\search_api_solr_admin\Access;

use Drupal\search_api_solr\SolrBackendInterface;
use Drupal\search_api\ServerInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides an access check for the "Solr Admin" routes.
 */
class SolrAdminAccessCheck implements AccessInterface {

  /**
   * A custom access check.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   Run access checks for this account.
   */
  public function access(AccountInterface $account, ServerInterface $search_api_server = NULL) {
    if ($search_api_server && $search_api_server->getBackend() instanceof SolrBackendInterface) {
      return AccessResult::allowed();
    }
    return AccessResult::forbidden();
  }

}
