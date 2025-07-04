
import { Card, CardContent } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { ArrowRight } from "lucide-react";

interface Category {
  id: number;
  name: string;
  description: string;
  image: string;
  productCount: number;
  color: string;
}

export const CategoryCard = ({ category }: { category: Category }) => {
  return (
    <Card className="group hover:shadow-2xl transition-all duration-300 cursor-pointer border-0 bg-white/90 backdrop-blur-sm hover:scale-105 overflow-hidden">
      <div className={`h-32 bg-gradient-to-r ${category.color} relative`}>
        <div className="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300" />
        <div className="absolute bottom-4 left-4 right-4">
          <h3 className="text-2xl font-bold text-white mb-1">{category.name}</h3>
          <p className="text-white/90 text-sm">{category.productCount} products</p>
        </div>
      </div>
      
      <CardContent className="p-6">
        <p className="text-gray-600 mb-4 leading-relaxed">{category.description}</p>
        
        <Button 
          className="w-full group-hover:bg-gradient-to-r group-hover:from-blue-600 group-hover:to-purple-600 transition-all duration-300"
          variant="outline"
        >
          Shop Now
          <ArrowRight className="ml-2 h-4 w-4 group-hover:translate-x-1 transition-transform duration-300" />
        </Button>
      </CardContent>
    </Card>
  );
};
