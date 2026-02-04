import { ShoppingCart, Smartphone } from 'lucide-react';
import heroImage from 'figma:asset/cd93739256ca1108f710c62b5e8996c9f5d07654.png';

export function Hero() {
  return (
    <div className="relative min-h-screen flex items-center justify-center overflow-hidden">
      {/* Background Image */}
      <div className="absolute inset-0">
        <img 
          src={heroImage} 
          alt="RGB Rock Light Kit" 
          className="w-full h-full object-cover object-center"
        />
        <div className="absolute inset-0 bg-gradient-to-b from-black/70 via-black/50 to-black"></div>
      </div>

      {/* Content */}
      <div className="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-20">
        <h1 className="text-3xl sm:text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-4 sm:mb-6 tracking-tight leading-tight">
          Multi-Colour RGB<br />
          <span className="bg-gradient-to-r from-purple-400 via-pink-500 to-cyan-400 bg-clip-text text-transparent">
            Rock Light Neon Kit
          </span>
        </h1>
        
        <p className="text-base sm:text-lg md:text-xl lg:text-2xl text-gray-300 mb-6 sm:mb-8 max-w-3xl mx-auto px-4">
          Transform your vehicle with stunning RGB lighting. App-controlled, 36 LED upgrade, and endless color possibilities.
        </p>

        <div className="flex flex-col sm:flex-row gap-3 sm:gap-4 justify-center items-center mb-8 sm:mb-12 px-4">
          <button className="w-full sm:w-auto bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-lg flex items-center justify-center gap-2 transition-all transform hover:scale-105">
            <ShoppingCart className="w-5 h-5" />
            Buy Now
          </button>
          <button className="w-full sm:w-auto bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-lg flex items-center justify-center gap-2 border border-white/20 transition-all">
            <Smartphone className="w-5 h-5" />
            Learn More
          </button>
        </div>

        <div className="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 md:gap-6 max-w-4xl mx-auto px-4">
          <div className="bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg p-3 sm:p-4">
            <div className="text-2xl sm:text-3xl font-bold text-cyan-400 mb-1">36</div>
            <div className="text-xs sm:text-sm text-gray-400">LED Lights</div>
          </div>
          <div className="bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg p-3 sm:p-4">
            <div className="text-2xl sm:text-3xl font-bold text-purple-400 mb-1">RGB</div>
            <div className="text-xs sm:text-sm text-gray-400">Multi-Color</div>
          </div>
          <div className="bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg p-3 sm:p-4">
            <div className="text-2xl sm:text-3xl font-bold text-pink-400 mb-1">App</div>
            <div className="text-xs sm:text-sm text-gray-400">Controlled</div>
          </div>
          <div className="bg-white/5 backdrop-blur-sm border border-white/10 rounded-lg p-3 sm:p-4">
            <div className="text-2xl sm:text-3xl font-bold text-green-400 mb-1">IP68</div>
            <div className="text-xs sm:text-sm text-gray-400">Waterproof</div>
          </div>
        </div>
      </div>

      {/* Scroll Indicator - hidden on mobile */}
      <div className="hidden md:block absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <div className="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center">
          <div className="w-1 h-3 bg-white/50 rounded-full mt-2"></div>
        </div>
      </div>
    </div>
  );
}