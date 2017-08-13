<?php
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\Controller\Web\Domain\SubDomain\Admin;

use OC\BusinessRules\Gateways\Pagination;
use OC\BusinessRules\Responders\PaginatedUseCaseResponse;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\ListEntities;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ListEntitiesController extends Controller
{
    public function listEntitiesAction(Request $request): Response
    {
        $entities = $this->getEntities($request);
        $vm = $this->buildVm($entities);

        return $this->render('', ['vm' => $vm]);
    }

    private function getEntities(Request $request): PaginatedUseCaseResponse
    {
        return $this->get('oc.business_rules.use_cases.domain.sub_domain.get_all_entities')
            ->execute(
                $this->get('oc.business_rules.requestors.domain.sub_domain.get_all_entities_request_builder')
                    ->create()
                    ->withItemsPerPage(Pagination::ITEMS_PER_PAGE_ADMIN)
                    ->withPage($request->get('page', 1))
                    ->build()
            );
    }

    private function buildVm(PaginatedUseCaseResponse $response): ListEntities
    {
        return
            $this->get('oc.app.view_models.web.domain.sub_domain.list_entities_builder')
                ->create()
                ->withEntities($this->get('oc.app.view_models.web.domain.sub_domain.entity_list_item_assembler')->createListItems($response->getItems()))
                ->withPagination($this->get('oc.view_models.pagination.pagination_factory')->createFromPaginatedUseCaseResponse($response, 'oc_web_domain_sub_domain_admin_list_entities'))
                ->build();
    }
}
