<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // RAAAdminBundle_airline
        if ($pathinfo === '/admin/airlines') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_RAAAdminBundle_airline;
            }

            return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::airlineAction',  '_route' => 'RAAAdminBundle_airline',);
        }
        not_RAAAdminBundle_airline:

        // RAAAdminBundle_viewAirline
        if (0 === strpos($pathinfo, '/view/airlines') && preg_match('#^/view/airlines/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_RAAAdminBundle_viewAirline;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_viewAirline')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::viewAirlineAction',));
        }
        not_RAAAdminBundle_viewAirline:

        // RAAAdminBundle_plan
        if ($pathinfo === '/plan') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_RAAAdminBundle_plan;
            }

            return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::planAction',  '_route' => 'RAAAdminBundle_plan',);
        }
        not_RAAAdminBundle_plan:

        // RAAAdminBundle_category
        if ($pathinfo === '/category') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_RAAAdminBundle_category;
            }

            return array (  '_controller' => 'RAAAdminBundle:Category:category',  '_route' => 'RAAAdminBundle_category',);
        }
        not_RAAAdminBundle_category:

        // RAAAdminBundle_airlinedelete
        if (0 === strpos($pathinfo, '/airline/delete') && preg_match('#^/airline/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_RAAAdminBundle_airlinedelete;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_airlinedelete')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::deleteAirlineAction',));
        }
        not_RAAAdminBundle_airlinedelete:

        if (0 === strpos($pathinfo, '/category')) {
            // RAAAdminBundle_categorydelete
            if (0 === strpos($pathinfo, '/category/delete') && preg_match('#^/category/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_RAAAdminBundle_categorydelete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_categorydelete')), array (  '_controller' => 'RAAAdminBundle:Category:delete',));
            }
            not_RAAAdminBundle_categorydelete:

            // RAAAdminBundle_categoryupdate
            if (0 === strpos($pathinfo, '/category/update') && preg_match('#^/category/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_RAAAdminBundle_categoryupdate;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_categoryupdate')), array (  '_controller' => 'RAAAdminBundle:Category:update',));
            }
            not_RAAAdminBundle_categoryupdate:

        }

        // RAAAdminBundle_plandelete
        if (0 === strpos($pathinfo, '/plan/delete') && preg_match('#^/plan/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_RAAAdminBundle_plandelete;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_plandelete')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::deletePlanAction',));
        }
        not_RAAAdminBundle_plandelete:

        // RAAAdminBundle_airlineupdate
        if (0 === strpos($pathinfo, '/airline/update') && preg_match('#^/airline/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_airlineupdate;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_airlineupdate')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::updateAirlineAction',));
        }
        not_RAAAdminBundle_airlineupdate:

        // RAAAdminBundle_planupdate
        if (0 === strpos($pathinfo, '/plan/update') && preg_match('#^/plan/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_planupdate;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_planupdate')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::updatePlanAction',));
        }
        not_RAAAdminBundle_planupdate:

        if (0 === strpos($pathinfo, '/admin')) {
            // RAAAdminBundle_dashboard
            if ($pathinfo === '/admin/dashboard') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_RAAAdminBundle_dashboard;
                }

                return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::dashboardAction',  '_route' => 'RAAAdminBundle_dashboard',);
            }
            not_RAAAdminBundle_dashboard:

            if (0 === strpos($pathinfo, '/admin/add')) {
                // RAAAdminBundle_addAirline
                if ($pathinfo === '/admin/addairline') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_RAAAdminBundle_addAirline;
                    }

                    return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::addAirlineAction',  '_route' => 'RAAAdminBundle_addAirline',);
                }
                not_RAAAdminBundle_addAirline:

                // RAAAdminBundle_addcategory
                if ($pathinfo === '/admin/addcategory') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_RAAAdminBundle_addcategory;
                    }

                    return array (  '_controller' => 'RAAAdminBundle:Category:addcategory',  '_route' => 'RAAAdminBundle_addcategory',);
                }
                not_RAAAdminBundle_addcategory:

                // RAAAdminBundle_addplan
                if ($pathinfo === '/admin/addplan') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_RAAAdminBundle_addplan;
                    }

                    return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::addplanAction',  '_route' => 'RAAAdminBundle_addplan',);
                }
                not_RAAAdminBundle_addplan:

            }

            // RAAAdminBundle_login
            if ($pathinfo === '/admin') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_RAAAdminBundle_login;
                }

                return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::indexAction',  '_route' => 'RAAAdminBundle_login',);
            }
            not_RAAAdminBundle_login:

            // RAAAdminBundle_logout
            if ($pathinfo === '/admin/logout') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_RAAAdminBundle_logout;
                }

                return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::logoutAction',  '_route' => 'RAAAdminBundle_logout',);
            }
            not_RAAAdminBundle_logout:

        }

        // RAAAdminBundle_getCities
        if (0 === strpos($pathinfo, '/realtor/getCities') && preg_match('#^/realtor/getCities/(?P<stateCode>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_getCities;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_getCities')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::getCitiesAction',));
        }
        not_RAAAdminBundle_getCities:

        // RAAAdminBundle_changepassword
        if ($pathinfo === '/changepassword') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_changepassword;
            }

            return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::changeAction',  '_route' => 'RAAAdminBundle_changepassword',);
        }
        not_RAAAdminBundle_changepassword:

        // RAAAdminBundle_forgotpassword
        if ($pathinfo === '/forgotpassword') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_forgotpassword;
            }

            return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::forgotAction',  '_route' => 'RAAAdminBundle_forgotpassword',);
        }
        not_RAAAdminBundle_forgotpassword:

        // RAAAdminBundle_request
        if ($pathinfo === '/request') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_request;
            }

            return array (  '_controller' => 'RAAAdminBundle:Request:request',  '_route' => 'RAAAdminBundle_request',);
        }
        not_RAAAdminBundle_request:

        // RAAAdminBundle_status
        if (0 === strpos($pathinfo, '/status') && preg_match('#^/status/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_status;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_status')), array (  '_controller' => 'RAAAdminBundle:Request:setStatus',));
        }
        not_RAAAdminBundle_status:

        if (0 === strpos($pathinfo, '/admin')) {
            // RAAAdminBundle_property
            if ($pathinfo === '/admin/flights') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_RAAAdminBundle_property;
                }

                return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::propertyAction',  '_route' => 'RAAAdminBundle_property',);
            }
            not_RAAAdminBundle_property:

            // RAAAdminBundle_addproperty
            if ($pathinfo === '/admin/add/flight') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_RAAAdminBundle_addproperty;
                }

                return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::addpropertyAction',  '_route' => 'RAAAdminBundle_addproperty',);
            }
            not_RAAAdminBundle_addproperty:

        }

        // RAAAdminBundle_propertydelete
        if (0 === strpos($pathinfo, '/deleteFlight') && preg_match('#^/deleteFlight/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_propertydelete;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_propertydelete')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::deletepropertyAction',));
        }
        not_RAAAdminBundle_propertydelete:

        // RAAAdminBundle_updateproperty
        if (0 === strpos($pathinfo, '/updateFlight') && preg_match('#^/updateFlight/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_updateproperty;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_updateproperty')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::updatepropertyAction',));
        }
        not_RAAAdminBundle_updateproperty:

        // RAAAdminBundle_images
        if (0 === strpos($pathinfo, '/images') && preg_match('#^/images/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_images;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_images')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::imagesAction',));
        }
        not_RAAAdminBundle_images:

        // RAAAdminBundle_claim
        if ($pathinfo === '/claim') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_claim;
            }

            return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::claimAction',  '_route' => 'RAAAdminBundle_claim',);
        }
        not_RAAAdminBundle_claim:

        // RAAAdminBundle_accepted
        if (0 === strpos($pathinfo, '/accepted/claim') && preg_match('#^/accepted/claim/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_accepted;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_accepted')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::acceptedAction',));
        }
        not_RAAAdminBundle_accepted:

        // RAAAdminBundle_rejected
        if (0 === strpos($pathinfo, '/rejected/claim') && preg_match('#^/rejected/claim/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_rejected;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_rejected')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::rejectedAction',));
        }
        not_RAAAdminBundle_rejected:

        // RAAAdminBundle_manageCms
        if ($pathinfo === '/cms') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_manageCms;
            }

            return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::manageCmsAction',  '_route' => 'RAAAdminBundle_manageCms',);
        }
        not_RAAAdminBundle_manageCms:

        // RAAAdminBundle_addCms
        if ($pathinfo === '/addcms') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_addCms;
            }

            return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::addCmsAction',  '_route' => 'RAAAdminBundle_addCms',);
        }
        not_RAAAdminBundle_addCms:

        // RAAAdminBundle_editCms
        if (0 === strpos($pathinfo, '/editcms') && preg_match('#^/editcms/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_editCms;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_editCms')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::editCmsAction',));
        }
        not_RAAAdminBundle_editCms:

        // RAAAdminBundle_deleteCms
        if (0 === strpos($pathinfo, '/delete/cms') && preg_match('#^/delete/cms/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_deleteCms;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_deleteCms')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::deleteCmsAction',));
        }
        not_RAAAdminBundle_deleteCms:

        // RAAAdminBundle_importRealtors
        if ($pathinfo === '/admin/import/Airlines') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_importRealtors;
            }

            return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::importRealtorsAction',  '_route' => 'RAAAdminBundle_importRealtors',);
        }
        not_RAAAdminBundle_importRealtors:

        // RAAAdminBundle_view
        if (0 === strpos($pathinfo, '/view/cms') && preg_match('#^/view/cms/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_view;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_view')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::viewCmsAction',));
        }
        not_RAAAdminBundle_view:

        if (0 === strpos($pathinfo, '/ad')) {
            // RAAAdminBundle_advertiesment
            if ($pathinfo === '/advertiesment') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_RAAAdminBundle_advertiesment;
                }

                return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::manageAdvertiesmentAction',  '_route' => 'RAAAdminBundle_advertiesment',);
            }
            not_RAAAdminBundle_advertiesment:

            // RAAAdminBundle_addAdvertiesment
            if ($pathinfo === '/add/Advertiesment') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_RAAAdminBundle_addAdvertiesment;
                }

                return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::addAdvertiesmentAction',  '_route' => 'RAAAdminBundle_addAdvertiesment',);
            }
            not_RAAAdminBundle_addAdvertiesment:

        }

        // RAAAdminBundle_editAdvertiesment
        if (0 === strpos($pathinfo, '/edit/Advertiesment') && preg_match('#^/edit/Advertiesment/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_editAdvertiesment;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_editAdvertiesment')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::editAdvertiesmentAction',));
        }
        not_RAAAdminBundle_editAdvertiesment:

        // RAAAdminBundle_deleteAdvertiesment
        if (0 === strpos($pathinfo, '/delete/Advertiesment') && preg_match('#^/delete/Advertiesment/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_deleteAdvertiesment;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_deleteAdvertiesment')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::deleteAdvertiesmentAction',));
        }
        not_RAAAdminBundle_deleteAdvertiesment:

        // RAAAdminBundle_getCsv
        if ($pathinfo === '/csv') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_getCsv;
            }

            return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::getCsvAction',  '_route' => 'RAAAdminBundle_getCsv',);
        }
        not_RAAAdminBundle_getCsv:

        // RAAAdminBundle_getPdf
        if ($pathinfo === '/Pdf') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_getPdf;
            }

            return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::getPdfAction',  '_route' => 'RAAAdminBundle_getPdf',);
        }
        not_RAAAdminBundle_getPdf:

        // RAAAdminBundle_reviewer
        if ($pathinfo === '/reviewer') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_reviewer;
            }

            return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::manageReviewerAction',  '_route' => 'RAAAdminBundle_reviewer',);
        }
        not_RAAAdminBundle_reviewer:

        if (0 === strpos($pathinfo, '/delete')) {
            // RAAAdminBundle_deleteReviewer
            if (0 === strpos($pathinfo, '/delete/reviewer') && preg_match('#^/delete/reviewer/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_RAAAdminBundle_deleteReviewer;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_deleteReviewer')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::deleteReviewerAction',));
            }
            not_RAAAdminBundle_deleteReviewer:

            // RAAAdminBundle_deletePropertyImages
            if (0 === strpos($pathinfo, '/delete/Property/Image') && preg_match('#^/delete/Property/Image/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_RAAAdminBundle_deletePropertyImages;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_deletePropertyImages')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::deleteImagesAction',));
            }
            not_RAAAdminBundle_deletePropertyImages:

        }

        // RAAAdminBundle_suspenedRealtors
        if ($pathinfo === '/error') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_suspenedRealtors;
            }

            return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::errorAction',  '_route' => 'RAAAdminBundle_suspenedRealtors',);
        }
        not_RAAAdminBundle_suspenedRealtors:

        // RAAAdminBundle_airlineImages
        if (0 === strpos($pathinfo, '/airlineImages') && preg_match('#^/airlineImages/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_airlineImages;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_airlineImages')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::updateAirlineImagesAction',));
        }
        not_RAAAdminBundle_airlineImages:

        // RAAAdminBundle_updateSlider
        if (0 === strpos($pathinfo, '/updateSlider') && preg_match('#^/updateSlider/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_updateSlider;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_updateSlider')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::updateSliderAction',));
        }
        not_RAAAdminBundle_updateSlider:

        // RAAAdminBundle_deleteSliderImages
        if (0 === strpos($pathinfo, '/delete/Slider') && preg_match('#^/delete/Slider/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_deleteSliderImages;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_deleteSliderImages')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::deleteSliderImagesAction',));
        }
        not_RAAAdminBundle_deleteSliderImages:

        if (0 === strpos($pathinfo, '/edit/Reviewer')) {
            // RAAAdminBundle_editReviewer
            if (preg_match('#^/edit/Reviewer/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_RAAAdminBundle_editReviewer;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_editReviewer')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::editReviewerAction',));
            }
            not_RAAAdminBundle_editReviewer:

            // RAAAdminBundle_ratingCompleteDetail
            if (rtrim($pathinfo, '/') === '/edit/Reviewer') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_RAAAdminBundle_ratingCompleteDetail;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'RAAAdminBundle_ratingCompleteDetail');
                }

                return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::ratingCompleteDetailAction',  '_route' => 'RAAAdminBundle_ratingCompleteDetail',);
            }
            not_RAAAdminBundle_ratingCompleteDetail:

        }

        // RAAAdminBundle_showRev
        if (0 === strpos($pathinfo, '/show/Reviewer/review') && preg_match('#^/show/Reviewer/review/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_showRev;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_showRev')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::showTotalReviewsAction',));
        }
        not_RAAAdminBundle_showRev:

        // RAAAdminBundle_manageReviews
        if ($pathinfo === '/manageReviews') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_manageReviews;
            }

            return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::manageReviewsAction',  '_route' => 'RAAAdminBundle_manageReviews',);
        }
        not_RAAAdminBundle_manageReviews:

        // RAAAdminBundle_publishReview
        if ($pathinfo === '/publishReview') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_publishReview;
            }

            return array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::publishReviewAction',  '_route' => 'RAAAdminBundle_publishReview',);
        }
        not_RAAAdminBundle_publishReview:

        // RAAAdminBundle_deleteReview
        if (0 === strpos($pathinfo, '/delete/Review') && preg_match('#^/delete/Review/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAAdminBundle_deleteReview;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'RAAAdminBundle_deleteReview')), array (  '_controller' => 'RAA\\AdminBundle\\Controller\\AdminController::deleteReviewAction',));
        }
        not_RAAAdminBundle_deleteReview:

        // raa_web_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_raa_web_homepage;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'raa_web_homepage');
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::indexAction',  '_route' => 'raa_web_homepage',);
        }
        not_raa_web_homepage:

        if (0 === strpos($pathinfo, '/writeReview')) {
            // raa_web_writeReview
            if ($pathinfo === '/writeReview') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_raa_web_writeReview;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::writeReviewAction',  '_route' => 'raa_web_writeReview',);
            }
            not_raa_web_writeReview:

            // raa_web_writeReviewDashboard
            if ($pathinfo === '/writeReview/dashboard') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_raa_web_writeReviewDashboard;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::writeReviewDashboardAction',  '_route' => 'raa_web_writeReviewDashboard',);
            }
            not_raa_web_writeReviewDashboard:

        }

        // raa_web_searchAirlines
        if ($pathinfo === '/airlines') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_searchAirlines;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::airlineAction',  '_route' => 'raa_web_searchAirlines',);
        }
        not_raa_web_searchAirlines:

        // raa_web_login
        if ($pathinfo === '/login') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_login;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::loginAction',  '_route' => 'raa_web_login',);
        }
        not_raa_web_login:

        // raa_web_registration
        if ($pathinfo === '/registration') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_registration;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::registrationAction',  '_route' => 'raa_web_registration',);
        }
        not_raa_web_registration:

        // raa_web_managePlan
        if ($pathinfo === '/managepaymentplans') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_managePlan;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::managePlanAction',  '_route' => 'raa_web_managePlan',);
        }
        not_raa_web_managePlan:

        // raa_web_feedback
        if ($pathinfo === '/feedbacks') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_feedback;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::feedbackAction',  '_route' => 'raa_web_feedback',);
        }
        not_raa_web_feedback:

        // raa_web_manageListing
        if ($pathinfo === '/managelisting') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_manageListing;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::manageListingAction',  '_route' => 'raa_web_manageListing',);
        }
        not_raa_web_manageListing:

        // raa_web_home
        if ($pathinfo === '/dashboard') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_home;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::dashboardAction',  '_route' => 'raa_web_home',);
        }
        not_raa_web_home:

        // raa_web_logout
        if ($pathinfo === '/logout') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_raa_web_logout;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::logoutAction',  '_route' => 'raa_web_logout',);
        }
        not_raa_web_logout:

        // raa_web_changeplan
        if ($pathinfo === '/changeplan') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_changeplan;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::changePlanAction',  '_route' => 'raa_web_changeplan',);
        }
        not_raa_web_changeplan:

        // raa_web_forgotpassword
        if ($pathinfo === '/forgotPassword') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_forgotpassword;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::forgotPasswordAction',  '_route' => 'raa_web_forgotpassword',);
        }
        not_raa_web_forgotpassword:

        if (0 === strpos($pathinfo, '/plan/get')) {
            // raa_web_getFeatures
            if (0 === strpos($pathinfo, '/plan/getFeatures') && preg_match('#^/plan/getFeatures/(?P<planId>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST    WRITEREVIEWDASHBOARD', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST    WRITEREVIEWDASHBOARD', 'HEAD'));
                    goto not_raa_web_getFeatures;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_getFeatures')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::getFeaturesAction',));
            }
            not_raa_web_getFeatures:

            // raa_web_getDescription
            if (0 === strpos($pathinfo, '/plan/getDescription') && preg_match('#^/plan/getDescription/(?P<planId>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_getDescription;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_getDescription')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::getDescriptionAction',));
            }
            not_raa_web_getDescription:

        }

        // raa_web_editListing
        if ($pathinfo === '/editlisting') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_editListing;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::editListingAction',  '_route' => 'raa_web_editListing',);
        }
        not_raa_web_editListing:

        if (0 === strpos($pathinfo, '/change')) {
            // raa_web_changeImage
            if ($pathinfo === '/changeImage') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_changeImage;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::changeImageAction',  '_route' => 'raa_web_changeImage',);
            }
            not_raa_web_changeImage:

            // raa_web_changeLogo
            if ($pathinfo === '/changeLogo') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_changeLogo;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::changeLogoAction',  '_route' => 'raa_web_changeLogo',);
            }
            not_raa_web_changeLogo:

        }

        // raa_web_profile
        if (0 === strpos($pathinfo, '/airline') && preg_match('#^/airline/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_profile;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_profile')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::showProfileAction',));
        }
        not_raa_web_profile:

        if (0 === strpos($pathinfo, '/WriteReview')) {
            // raa_web_review
            if (preg_match('#^/WriteReview/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_review;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_review')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::showReviewsAction',));
            }
            not_raa_web_review:

            // raa_web_reviewDashboard
            if (0 === strpos($pathinfo, '/WriteReview/dashboard') && preg_match('#^/WriteReview/dashboard/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_reviewDashboard;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_reviewDashboard')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::showReviewDashboardAction',));
            }
            not_raa_web_reviewDashboard:

        }

        // raa_web_reply
        if ($pathinfo === '/reply') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_reply;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::replyAction',  '_route' => 'raa_web_reply',);
        }
        not_raa_web_reply:

        if (0 === strpos($pathinfo, '/airline')) {
            // raa_web_property
            if ($pathinfo === '/airline/manageflights') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_property;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::propertyAction',  '_route' => 'raa_web_property',);
            }
            not_raa_web_property:

            // raa_web_addProperty
            if ($pathinfo === '/airline/addflight') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_addProperty;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::addPropertyAction',  '_route' => 'raa_web_addProperty',);
            }
            not_raa_web_addProperty:

        }

        // raa_web_subscriber
        if ($pathinfo === '/subscribe') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_subscriber;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::SubscriberAction',  '_route' => 'raa_web_subscriber',);
        }
        not_raa_web_subscriber:

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/airline')) {
                // raa_web_updateProperty
                if (0 === strpos($pathinfo, '/airline/updateflight') && preg_match('#^/airline/updateflight(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_raa_web_updateProperty;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_updateProperty')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::updatePropertyAction',));
                }
                not_raa_web_updateProperty:

                // raa_web_deleteProperty
                if (0 === strpos($pathinfo, '/airline/flight/delete') && preg_match('#^/airline/flight/delete(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_raa_web_deleteProperty;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_deleteProperty')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::deletePropertyAction',));
                }
                not_raa_web_deleteProperty:

            }

            // raa_web_addSliderImage
            if ($pathinfo === '/addSliderImage') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_addSliderImage;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::addSliderImageAction',  '_route' => 'raa_web_addSliderImage',);
            }
            not_raa_web_addSliderImage:

        }

        // raa_web_demo
        if ($pathinfo === '/demo') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_demo;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::demoAction',  '_route' => 'raa_web_demo',);
        }
        not_raa_web_demo:

        // raa_web_capture
        if (0 === strpos($pathinfo, '/capture') && preg_match('#^/capture(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_capture;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_capture')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::captureEmailAction',));
        }
        not_raa_web_capture:

        // raa_web_propertyDetail
        if (0 === strpos($pathinfo, '/propertyDetail') && preg_match('#^/propertyDetail(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_propertyDetail;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_propertyDetail')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::propertyDetailAction',));
        }
        not_raa_web_propertyDetail:

        // raa_web_transactionDetail
        if ($pathinfo === '/transactionDetail') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_transactionDetail;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::transactionDetailAction',  '_route' => 'raa_web_transactionDetail',);
        }
        not_raa_web_transactionDetail:

        // raa_web_paypal
        if ($pathinfo === '/paypal') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_paypal;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::payPalAction',  '_route' => 'raa_web_paypal',);
        }
        not_raa_web_paypal:

        if (0 === strpos($pathinfo, '/c')) {
            // raa_web_companies
            if ($pathinfo === '/companies') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_companies;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::countCompaniesAction',  '_route' => 'raa_web_companies',);
            }
            not_raa_web_companies:

            // raa_web_cancel
            if ($pathinfo === '/cancel') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_cancel;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::cancelAction',  '_route' => 'raa_web_cancel',);
            }
            not_raa_web_cancel:

        }

        // raa_web_success
        if ($pathinfo === '/success') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_success;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::successAction',  '_route' => 'raa_web_success',);
        }
        not_raa_web_success:

        // raa_web_confirmationEmail
        if (0 === strpos($pathinfo, '/confirmation') && preg_match('#^/confirmation/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_confirmationEmail;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_confirmationEmail')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::confirmationEmailAction',));
        }
        not_raa_web_confirmationEmail:

        // verifyfbaccount
        if ($pathinfo === '/verifyfbaccount') {
            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::verifyfbaccountAction',  '_route' => 'verifyfbaccount',);
        }

        // raa_web_searchDetail
        if (0 === strpos($pathinfo, '/propertyDetail') && preg_match('#^/propertyDetail/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_searchDetail;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_searchDetail')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::propertySearchDetailAction',));
        }
        not_raa_web_searchDetail:

        // raa_web_claimLogin
        if (0 === strpos($pathinfo, '/claimLogin') && preg_match('#^/claimLogin/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_claimLogin;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_claimLogin')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::claimLoginAction',));
        }
        not_raa_web_claimLogin:

        // raa_web_page
        if (0 === strpos($pathinfo, '/page') && preg_match('#^/page(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_page;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_page')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::pageAction',));
        }
        not_raa_web_page:

        if (0 === strpos($pathinfo, '/check')) {
            // raa_web_checkEmailExistance
            if ($pathinfo === '/checkEmail') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_checkEmailExistance;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::checkEmailExistanceAction',  '_route' => 'raa_web_checkEmailExistance',);
            }
            not_raa_web_checkEmailExistance:

            // raa_web_checkUserExistance
            if (0 === strpos($pathinfo, '/checkUser') && preg_match('#^/checkUser/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_checkUserExistance;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_checkUserExistance')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::checkUserExistanceAction',));
            }
            not_raa_web_checkUserExistance:

        }

        // raa_web_successClaim
        if ($pathinfo === '/succesfull/claim') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_successClaim;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::successfulClaimAction',  '_route' => 'raa_web_successClaim',);
        }
        not_raa_web_successClaim:

        if (0 === strpos($pathinfo, '/get')) {
            // raa_web_getBanner
            if ($pathinfo === '/getBanner') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_getBanner;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::getBannerAction',  '_route' => 'raa_web_getBanner',);
            }
            not_raa_web_getBanner:

            // raa_web_getAdvertiesment
            if ($pathinfo === '/getAdvertiesment') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_getAdvertiesment;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::getAdvertiesmentAction',  '_route' => 'raa_web_getAdvertiesment',);
            }
            not_raa_web_getAdvertiesment:

        }

        // raa_web_showCms
        if ($pathinfo === '/ss') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_showCms;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::showCmsAction',  '_route' => 'raa_web_showCms',);
        }
        not_raa_web_showCms:

        // raa_web_showCmsFooter
        if ($pathinfo === '/footer') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_showCmsFooter;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::showCmsFooterAction',  '_route' => 'raa_web_showCmsFooter',);
        }
        not_raa_web_showCmsFooter:

        // raa_web_transactionSubmit
        if ($pathinfo === '/transactions') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_transactionSubmit;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::transactionSubmitAction',  '_route' => 'raa_web_transactionSubmit',);
        }
        not_raa_web_transactionSubmit:

        // raa_web_paymentSubmit
        if ($pathinfo === '/registered') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_paymentSubmit;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::successPaymentAction',  '_route' => 'raa_web_paymentSubmit',);
        }
        not_raa_web_paymentSubmit:

        // raa_web_showPropertyImages
        if (0 === strpos($pathinfo, '/airline/imagess') && preg_match('#^/airline/imagess/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_showPropertyImages;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_showPropertyImages')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::showPropertyImagesAction',));
        }
        not_raa_web_showPropertyImages:

        // raa_web_deleteRealtorPropertyImages
        if (0 === strpos($pathinfo, '/delete/airline/Property/Image') && preg_match('#^/delete/airline/Property/Image/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_deleteRealtorPropertyImages;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_deleteRealtorPropertyImages')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::deleteAirlineImagesAction',));
        }
        not_raa_web_deleteRealtorPropertyImages:

        // RAAWebBundle_updatePropertyMainImage
        if ($pathinfo === '/property/mainImage') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAWebBundle_updatePropertyMainImage;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::updatePropertyMainImageAction',  '_route' => 'RAAWebBundle_updatePropertyMainImage',);
        }
        not_RAAWebBundle_updatePropertyMainImage:

        // RAAWebBundle_searchAlphabetically
        if ($pathinfo === '/search/alphabetically') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_RAAWebBundle_searchAlphabetically;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::searchAlphabeticallyAction',  '_route' => 'RAAWebBundle_searchAlphabetically',);
        }
        not_RAAWebBundle_searchAlphabetically:

        // raa_web_flights
        if (0 === strpos($pathinfo, '/airline/flights') && preg_match('#^/airline/flights/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_flights;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_flights')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::airlineFlightsAction',));
        }
        not_raa_web_flights:

        // raa_web_privacyPolicy
        if ($pathinfo === '/privacyPolicy') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_privacyPolicy;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::privacyPolicyAction',  '_route' => 'raa_web_privacyPolicy',);
        }
        not_raa_web_privacyPolicy:

        // raa_web_aboutUs
        if ($pathinfo === '/aboutus') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_aboutUs;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::aboutUsAction',  '_route' => 'raa_web_aboutUs',);
        }
        not_raa_web_aboutUs:

        // raa_web_siteMap
        if ($pathinfo === '/siteMap') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_siteMap;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::siteMapAction',  '_route' => 'raa_web_siteMap',);
        }
        not_raa_web_siteMap:

        // raa_web_terms
        if ($pathinfo === '/terms') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_terms;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::termsAction',  '_route' => 'raa_web_terms',);
        }
        not_raa_web_terms:

        // raa_web_faq
        if ($pathinfo === '/faq') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_faq;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::faqAction',  '_route' => 'raa_web_faq',);
        }
        not_raa_web_faq:

        // raa_web_disclaimer
        if ($pathinfo === '/disclaimer') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_disclaimer;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::disclaimerAction',  '_route' => 'raa_web_disclaimer',);
        }
        not_raa_web_disclaimer:

        // raa_web_fullServices
        if (0 === strpos($pathinfo, '/completedetail') && preg_match('#^/completedetail/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_fullServices;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_fullServices')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::fullServicesAction',));
        }
        not_raa_web_fullServices:

        // raa_web_airlineDetail
        if ($pathinfo === '/airlineDetail') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_airlineDetail;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::airlineDetailAction',  '_route' => 'raa_web_airlineDetail',);
        }
        not_raa_web_airlineDetail:

        // raa_web_searchCities
        if ($pathinfo === '/citiesAirline') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_searchCities;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::searchCitiesAction',  '_route' => 'raa_web_searchCities',);
        }
        not_raa_web_searchCities:

        // raa_web_detailReviews
        if (0 === strpos($pathinfo, '/detailsReviews') && preg_match('#^/detailsReviews/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_detailReviews;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_detailReviews')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::detailsReviewAction',));
        }
        not_raa_web_detailReviews:

        if (0 === strpos($pathinfo, '/a')) {
            // raa_web_getAirlineName
            if ($pathinfo === '/allAirlines/name') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_getAirlineName;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::getAirlineNameAction',  '_route' => 'raa_web_getAirlineName',);
            }
            not_raa_web_getAirlineName:

            // raa_web_airlinesReviews
            if (0 === strpos($pathinfo, '/airline/reviewes') && preg_match('#^/airline/reviewes/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_airlinesReviews;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_airlinesReviews')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::airlinesReviewsAction',));
            }
            not_raa_web_airlinesReviews:

        }

        if (0 === strpos($pathinfo, '/con')) {
            // raa_web_contactUs
            if ($pathinfo === '/contact-us') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_contactUs;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::contactUsAction',  '_route' => 'raa_web_contactUs',);
            }
            not_raa_web_contactUs:

            if (0 === strpos($pathinfo, '/confirmed')) {
                // raa_web_confirmedSubscribe
                if (0 === strpos($pathinfo, '/confirmed/subscription') && preg_match('#^/confirmed/subscription/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_raa_web_confirmedSubscribe;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_confirmedSubscribe')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::confirmedSubscriptionAction',));
                }
                not_raa_web_confirmedSubscribe:

                // raa_web_confirmedRegistration
                if (0 === strpos($pathinfo, '/confirmed/registration') && preg_match('#^/confirmed/registration/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_raa_web_confirmedRegistration;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_confirmedRegistration')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::confirmedRegistrationAction',));
                }
                not_raa_web_confirmedRegistration:

            }

        }

        // raa_web_submitReviewDashboard
        if ($pathinfo === '/submitReview/s') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_submitReviewDashboard;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::submitReviewDashboardAction',  '_route' => 'raa_web_submitReviewDashboard',);
        }
        not_raa_web_submitReviewDashboard:

        // raa_web_approveReview
        if (0 === strpos($pathinfo, '/approve/review') && preg_match('#^/approve/review/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_approveReview;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_approveReview')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::approveReviewAction',));
        }
        not_raa_web_approveReview:

        // raa_web_thankYou
        if ($pathinfo === '/thank-you-page') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_thankYou;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::thankYouAction',  '_route' => 'raa_web_thankYou',);
        }
        not_raa_web_thankYou:

        // raa_web_deleteReviews
        if (0 === strpos($pathinfo, '/delete/reviews') && preg_match('#^/delete/reviews/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_deleteReviews;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_deleteReviews')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::deleteReviewsAction',));
        }
        not_raa_web_deleteReviews:

        if (0 === strpos($pathinfo, '/edit')) {
            // raa_web_editReviews
            if (0 === strpos($pathinfo, '/edit/reviews') && preg_match('#^/edit/reviews/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_editReviews;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_editReviews')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::editReviewsAction',));
            }
            not_raa_web_editReviews:

            // raa_web_viewReviews
            if (0 === strpos($pathinfo, '/edit/view/reviews') && preg_match('#^/edit/view/reviews/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_viewReviews;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_viewReviews')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::viewReviewsAction',));
            }
            not_raa_web_viewReviews:

        }

        if (0 === strpos($pathinfo, '/facebook')) {
            // raa_web_fbLogin
            if ($pathinfo === '/facebook') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_fbLogin;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::facebookLoginAction',  '_route' => 'raa_web_fbLogin',);
            }
            not_raa_web_fbLogin:

            // raa_web_fbRegistration
            if ($pathinfo === '/facebook/Registration') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_fbRegistration;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::facebookRegistrationAction',  '_route' => 'raa_web_fbRegistration',);
            }
            not_raa_web_fbRegistration:

        }

        if (0 === strpos($pathinfo, '/check')) {
            // raa_web_checkUser
            if ($pathinfo === '/check/User') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_checkUser;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\AirlineController::checkUserAction',  '_route' => 'raa_web_checkUser',);
            }
            not_raa_web_checkUser:

            // raa_web_checkHeadline
            if ($pathinfo === '/check/Headline') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_raa_web_checkHeadline;
                }

                return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::checkHeadlineAction',  '_route' => 'raa_web_checkHeadline',);
            }
            not_raa_web_checkHeadline:

        }

        // raa_web_airlinePagination
        if ($pathinfo === '/sdsd/pagination') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_airlinePagination;
            }

            return array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::airlinePaginationAction',  '_route' => 'raa_web_airlinePagination',);
        }
        not_raa_web_airlinePagination:

        // raa_web_pageFooter
        if (preg_match('#^/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_raa_web_pageFooter;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'raa_web_pageFooter')), array (  '_controller' => 'RAA\\WebBundle\\Controller\\WebController::pageFooterAction',));
        }
        not_raa_web_pageFooter:

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
