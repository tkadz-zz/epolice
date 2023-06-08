<?php

class PignationView extends Pignation{

    public function allUsers($recordsPerPage, $query){
        $records_per_page=$recordsPerPage;
        $paginate = new Pignation();
        $newquery = $paginate->paging($query,$records_per_page);
        $paginate->allUsersView($newquery);
        $paginate->paginationLinkNumbers($query,$records_per_page);
    }


}