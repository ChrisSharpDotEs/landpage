class Extractor {
    #value;
    constructor(html, pattern){
        this.#value = this.#extract(html, pattern)
    }

    getValue(){
        return this.#value;
    }
    
    #extract(html, pattern){
        let capture = pattern.exec(html);
        return capture[1];
    }
}
let html = 'https://www.google.es/?gws_rd=ssl';

let image = new Extractor(html, new RegExp(/.png/));

console.log(image);