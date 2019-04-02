//Feature1: view/visits

//find mean
//visualVisits = SELECT count(*) FROM `mdl_vark_visits` WHERE `sectionId`=1 

//AuditoryVisits = SELECT count(*) FROM `mdl_vark_visits` WHERE `sectionId`=2 

//ReadingVisits = SELECT count(*) FROM `mdl_vark_visits` WHERE `sectionId`=3 

//KinestheticVisits = SELECT count(*) FROM `mdl_vark_visits` WHERE `sectionId`=4 

meanV = visualVisits/20
meanA = AuditoryVisits/20
meanR = ReadingVisits/20
meanK = KinestheticVisits/20

//find standard deviation
visualVisitsByLearner = SELECT count(*) FROM `mdl_vark_visits` WHERE `sectionId`=1 GROUP BY `userId`  //5,6,8,7,
//visualSD = Sqrt{Ɛ(Fi-μ )^2 /20}

auditoryVisitsByLearner = SELECT count(*) FROM `mdl_vark_visits` WHERE `sectionId`=1 GROUP BY `userId`  //5,6,8,7,
//auditorySD = Sqrt{Ɛ(Fi-μ )^2 /20}

ReadingVisitsByLearner = SELECT count(*) FROM `mdl_vark_visits` WHERE `sectionId`=1 GROUP BY `userId`  //5,6,8,7,
//ReadingSD = Sqrt{Ɛ(Fi-μ )^2 /20}

kinestheticVisitsByLearner = SELECT count(*) FROM `mdl_vark_visits` WHERE `sectionId`=1 GROUP BY `userId`  //5,6,8,7,
//kinestheticSD = Sqrt{Ɛ(Fi-μ )^2 /20}
