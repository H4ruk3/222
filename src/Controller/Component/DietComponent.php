<?php

namespace App\Controller\Component;

use Cake\Controller\Component;

class DietComponent extends Component
{
    
    //Ectomorphic
    //Для эктоморфов: белки - 20-30%, углеводы - 50-60%, жиры — 20-30%
    const ECT_PROTEINS_MIN = 0.2;
    const ECT_PROTEINS_MAX = 0.3;
        
    const ECT_CARBOHYDRATES_MIN = 0.5;
    const ECT_CARBOHYDRATES_MAX = 0.6;
        
     const ECT_FATS_MIN = 0.2;
     const ECT_FATS_MAX = 0.3;
    
    //Endomorphic
    //Для эндоморфов: белки - 40-50%, углеводы -30-40%, жиры - 10-15%.
     const END_PROTEINS_MIN = 0.4;
     const END_PROTEINS_MAX = 0.5;
        
     const END_CARBOHYDRATES_MIN = 0.3;
     const END_CARBOHYDRATES_MAX = 0.4;
        
     const END_FATS_MIN = 0.1;
     const END_FATS_MAX = 0.15;
    
    //Mesomorphic
    //Для мезоморфов: белки - 30-40%, углеводы - 40-50%, жиры — 10-20%.
     const MES_PROTEINS_MIN = 0.3;
     const MES_PROTEINS_MAX = 0.4;
        
     const MES_CARBOHYDRATES_MIN = 0.4;
     const MES_CARBOHYDRATES_MAX = 0.5;
        
     const MES_FATS_MIN = 0.1;
     const MES_FATS_MAX = 0.2;
    
    //Ккал в 1гр
     const KCAL_PROTEINS = 3.8;
     const KCAL_FATS = 9.3;
     const KCAL_CARBOHYDRATES = 4.1;
    
    public $ave_kcal = 1;

    /* $weight - вес 
    $growth - рост 
    $age - возраст
    $sex - пол
    $actCoef - коэф. активности */
    public function Harris_Benedict($weight, $growth, $age, $sex, $actCoef) {
    
        switch ($sex) {
        
            case "male":
                $tmp = 88.362+(13.397*$weight)+(4.799*$growth)-(5.677*$age);
                break;
            case "female":
                $tmp = 447.593+(9.247*$weight)+(3.098*$growth)-(4.33*$age);
                break;
        
        }
        
        $tmp *= $actCoef;
        return $tmp;
    
    }
    
    /* $weight - вес 
    $growth - рост 
    $age - возраст
    $sex - пол
    $actCoef - коэф. активности 
    $fat - процент жира 
    $waist - обхват талии */
    public function Catch_McArdle($weight, $growth, $age, $sex, $actCoef, $fat, $waist) {   
    
        if ($fat == 0) {
            
            switch ($sex) {
                case "male":
                    $fat = (((4.15*$waist/2.54)-(0.082*$weight/0.454)-98.42)/($weight/0.454))*100;
                    break;
                case "female":
                    $fat = (((4.15*$waist/2.54)-(0.082*$weight/0.454)-76.76)/($weight/0.454))*100;
                    break;

            } 
            
        }
        
        $tmp = 370+(21.6*$weight*((100-$fat)/100));
        $tmp *= $actCoef;
        return $tmp;
        
    }

    public function setAveKkal($val) {
        $this->ave_kcal = $val;
    }
    
    public function PFC_for_day($somatotype, $weight) {
        
        switch ($somatotype) {
                
            case 1://эктоморф
                //белки
                $pr_min = self::ECT_PROTEINS_MIN;
                $pr_max = self::ECT_PROTEINS_MAX;
                //жиры
                $ft_min = self::ECT_FATS_MIN;
                $ft_max = self::ECT_FATS_MAX;
                //углеводы
                $ca_min = self::ECT_CARBOHYDRATES_MIN;
                $ca_max = self::ECT_CARBOHYDRATES_MAX;
                break;
            case 2://мезоморф
                //белки
                $pr_min = self::MES_PROTEINS_MIN;
                $pr_max = self::MES_PROTEINS_MAX;
                //жиры
                $ft_min = self::MES_FATS_MIN;
                $ft_max = self::MES_FATS_MAX;
                //углеводы
                $ca_min = self::MES_CARBOHYDRATES_MIN;
                $ca_max = self::MES_CARBOHYDRATES_MAX;   
                break;
            case 3://эндоморф
                //белки
                $pr_min = self::END_PROTEINS_MIN;
                $pr_max = self::END_PROTEINS_MAX;
                //жиры
                $ft_min = self::END_FATS_MIN;
                $ft_max = self::END_FATS_MAX;
                //углеводы
                $ca_min = self::END_CARBOHYDRATES_MIN;
                $ca_max = self::END_CARBOHYDRATES_MAX;   
                break;
                
        }
        
        //белки
        $prKcalL = $this -> ave_kcal * $pr_min;
        $prKcalR = $this -> ave_kcal * $pr_max; 
        $avePrKcal = ($prKcalL + $prKcalR)/2;  //среднее для белков в ккал

        $prGrL = $prKcalL / self::KCAL_PROTEINS;
        $prGrR = $prKcalR / self::KCAL_PROTEINS;
        $avePrGr = ($prGrL + $prGrR)/2;  //среднее для белков в граммах

        $prCfL = $prGrL / $weight;
        $prCfR = $prGrR / $weight;
        $avePrCf = ($prCfL + $prCfR)/2;  //среднее значение для белков (коэф)

        //жиры
        $ftKcalL = $this -> ave_kcal * $ft_min;
        $ftKcalR = $this -> ave_kcal * $ft_max;
        $aveFtKcal = ($ftKcalL + $ftKcalR)/2;  //среднее для жиров в ккал

        $ftGrL = $ftKcalL / self::KCAL_FATS;
        $ftGrR = $ftKcalR / self::KCAL_FATS;
        $aveFtGr = ($ftGrL + $ftGrR)/2;  //среднее для жиров в граммах

        $ftCfL = $ftGrL / $weight;
        $ftCfR = $ftGrR / $weight;
        $aveFtCf = ($ftCfL + $ftCfR)/2;  //среднее значение для жиров (коэф)

        //углеводы
        $caKcalL = $this -> ave_kcal * $ca_min;
        $caKcalR = $this -> ave_kcal * $ca_max;
        $aveCaKcal = ($caKcalL + $caKcalR)/2;  //среднее для углеводов в ккал

        $caGrL = $caKcalL / self::KCAL_CARBOHYDRATES;
        $caGrR = $caKcalR / self::KCAL_CARBOHYDRATES;
        $aveCaGr = ($caGrL + $caGrR)/2;  //среднее для углеводов в граммах

        $caCfL = $caGrL / $weight;
        $caCfR = $caGrR / $weight;
        $aveCaCf = ($caCfL + $caCfR)/2;  //среднее значение для углеводов (коэф)  
        
        $res = [
            "avePrCf" => "$avePrKcal",
            "aveFtCf" => "$aveFtKcal",
            "aveCaCf" => "$aveCaKcal",
        ];
        
        return $res;
        
    }

}