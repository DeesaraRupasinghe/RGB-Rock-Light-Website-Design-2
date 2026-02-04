import { Package, Ruler, Zap, Shield } from 'lucide-react';
import productImage from 'figma:asset/9025547dfa134045dd78a6ec6efbce726860756a.png';

export function ProductInfo() {
  return (
    <section className="py-12 sm:py-16 md:py-20 bg-gradient-to-b from-gray-900 to-black">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-10 sm:mb-12 md:mb-16">
          <h2 className="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-3 sm:mb-4 px-4">
            Product Specifications
          </h2>
          <p className="text-base sm:text-lg md:text-xl text-gray-400 px-4">
            Compact design with professional-grade components
          </p>
        </div>

        <div className="grid lg:grid-cols-2 gap-8 sm:gap-10 md:gap-12 items-center">
          <div className="order-1 lg:order-1">
            <img 
              src={productImage} 
              alt="Product Information" 
              className="w-full rounded-xl sm:rounded-2xl shadow-2xl"
            />
          </div>

          <div className="space-y-4 sm:space-y-5 md:space-y-6 order-2 lg:order-2">
            <div className="bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg sm:rounded-xl p-4 sm:p-5 md:p-6 hover:border-purple-500/40 transition-all">
              <div className="flex items-start gap-3 sm:gap-4">
                <div className="w-10 h-10 sm:w-12 sm:h-12 bg-purple-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                  <Ruler className="w-5 h-5 sm:w-6 sm:h-6 text-purple-400" />
                </div>
                <div>
                  <h3 className="text-base sm:text-lg md:text-xl font-bold text-white mb-1 sm:mb-2">Compact Dimensions</h3>
                  <p className="text-sm sm:text-base text-gray-400">
                    6.9cm × 4.3cm × 1.4cm - Perfect size for versatile mounting locations
                  </p>
                </div>
              </div>
            </div>

            <div className="bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg sm:rounded-xl p-4 sm:p-5 md:p-6 hover:border-cyan-500/40 transition-all">
              <div className="flex items-start gap-3 sm:gap-4">
                <div className="w-10 h-10 sm:w-12 sm:h-12 bg-cyan-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                  <Package className="w-5 h-5 sm:w-6 sm:h-6 text-cyan-400" />
                </div>
                <div>
                  <h3 className="text-base sm:text-lg md:text-xl font-bold text-white mb-1 sm:mb-2">Complete Kit</h3>
                  <p className="text-sm sm:text-base text-gray-400">
                    Includes mounting screws, connectors, and all necessary hardware for easy installation
                  </p>
                </div>
              </div>
            </div>

            <div className="bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg sm:rounded-xl p-4 sm:p-5 md:p-6 hover:border-pink-500/40 transition-all">
              <div className="flex items-start gap-3 sm:gap-4">
                <div className="w-10 h-10 sm:w-12 sm:h-12 bg-pink-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                  <Zap className="w-5 h-5 sm:w-6 sm:h-6 text-pink-400" />
                </div>
                <div>
                  <h3 className="text-base sm:text-lg md:text-xl font-bold text-white mb-1 sm:mb-2">Daisy Chain Design</h3>
                  <p className="text-sm sm:text-base text-gray-400">
                    Connect multiple pods together for synchronized lighting effects across your vehicle
                  </p>
                </div>
              </div>
            </div>

            <div className="bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg sm:rounded-xl p-4 sm:p-5 md:p-6 hover:border-green-500/40 transition-all">
              <div className="flex items-start gap-3 sm:gap-4">
                <div className="w-10 h-10 sm:w-12 sm:h-12 bg-green-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                  <Shield className="w-5 h-5 sm:w-6 sm:h-6 text-green-400" />
                </div>
                <div>
                  <h3 className="text-base sm:text-lg md:text-xl font-bold text-white mb-1 sm:mb-2">Weather Resistant</h3>
                  <p className="text-sm sm:text-base text-gray-400">
                    IP68 waterproof rating ensures reliable performance in all weather conditions
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}